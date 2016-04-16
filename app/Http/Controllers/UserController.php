<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $idUser = Auth::user()->id;
        $user = DB::select("select * from libros where id = 1");
        $users = json_encode($user);
        return view('biblioteca.bibliotecarios.index', compact('users'));
    }

    public function create()
    {
        return view('biblioteca.bibliotecarios.create');
    }

    public function store(UserRequest $request)
    {
        try {
            $user = new User();

            $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;
            $user->documento = $request->documento;
            $user->direccion = $request->direccion;
            $user->email = $request->email;
            $user->password = Hash::make($request->get('password'));
            $user->rol = $request->rol;

            $user->save();

            return redirect('biblioteca/users');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
         //   return Redirect::to('biblioteca/users/create');
        }

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('biblioteca.admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('biblioteca.bibliotecarios.edit', compact('user'));
    }

    public function update($id, UserRequest $request)
    {
        try {
            $user = User::find($id);
            $user->update($request->all());
            return redirect('biblioteca/users');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return view('biblioteca.bibliotecarios.edit', compact('user'));
        }
    }

}
