<?php

use App\Http\Controllers;
use App\User;

Route::resource('biblioteca/usuarios', 'UsuarioController');
Route::resource('biblioteca/libros', 'LibroController');
Route::resource('biblioteca/categorias', 'CategoriaController');
Route::resource('biblioteca/autores', 'AutorController');
Route::resource('biblioteca/editoriales', 'EditorialController');
Route::resource('biblioteca/ubicaciones', 'UbicacionController');
Route::resource('biblioteca/users', 'UserController');
Route::resource('biblioteca/prestamos', 'PrestamoController');
Route::resource('biblioteca/password', 'PasswordController');

Route::get('biblioteca/consultar/libros', 'LibroController@consultar');
Route::get('biblioteca/consultar/usuarios', 'UsuarioController@consultar');
Route::get('biblioteca/delete/usuarios', 'UsuarioController@delete');
Route::post('password/forgot', 'PasswordController@passwordForgot');
Route::get('password/forgot', 'PasswordController@passwordForgotView');
Route::post('busqueda/catalogo', 'CatalogoController@showSearch');
Route::get('busqueda/catalogo', 'CatalogoController@viewSearch');
Route::get('biblioteca/historical/prestamos', 'PrestamoController@historical');

Route::get('biblioteca', ['middleware' => 'auth', function () {
    return view('master');
}]);

Route::get('biblioteca/users', ['middleware' => 'auth', function () {
    if(Auth::user()->rol == 'bibliotecario'){
        return redirect('biblioteca');
    }else{
        $idUser = Auth::user()->id;
        $user = DB::select("select * from users where id !=".$idUser);
        $users = json_encode($user);

        return view('biblioteca.bibliotecarios.index', compact('users'));
    }
}]);

Route::get('/', function () {
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/contact', function () {
    return view('/contact');
});
Route::get('/downloads', function () {
    return view('downloads');
});
Route::get('/siteMap', function () {
    return view('siteMap');
});

Route::get('biblioteca/recursos/libros', 'RecursosLibrosController@index');



Route::resource('login', 'LoginController');
Route::get('logout', 'LoginController@logout');
Route::get('biblioteca/password/reset', 'LoginController@resetPassword');

Route::get('auth/login', function () {
    return view('auth/login');
});

Route::get('biblioteca/auth/reset', function () {
    return view('auth/reset');
});
