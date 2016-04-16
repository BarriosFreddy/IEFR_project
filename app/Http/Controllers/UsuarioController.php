<?php namespace App\Http\Controllers;

use App\Http\Requests\ParametersRequest;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\idModelRequest;
use App\Models\Usuario;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpSpec\Exception\Exception;


class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = Usuario::where('estado', '>=', 1)->get();
        return view('biblioteca.usuarios.index', compact('usuarios'));
    }

    public function search(SearchRequest $request)
    {
        $valor = $request->get('valor');

        $usuarios = DB::select("select * from usuarios where nombre like '%".$valor."%' or
		                                                 	 apellido like '%".$valor."%' or
		                                                 	 documento like '%".$valor."%' or
		                                                 	 email  like '%".$valor."%' or
		                                                 	 perfil like '%".$valor."%'
		                                                	 order by nombre");

        return view('biblioteca.usuarios.index', compact('usuarios'));

    }

    public function create()
    {
        return view('biblioteca.usuarios.create');
    }

    public function store(UsuarioRequest $request)
    {
        try {
            Usuario::create($request->all());
            return redirect('biblioteca/usuarios');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return Redirect::to('biblioteca/usuarios/create');
        }

    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('biblioteca.usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('biblioteca.usuarios.edit', compact('usuario'));
    }

    public function update($id, UsuarioRequest $request)
    {
        try {
            $usuario = Usuario::find($id);
            $usuario->update($request->all());
            return redirect('biblioteca/usuarios');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return view('biblioteca.usuarios.edit', compact('usuario'));
        }
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return redirect('biblioteca/usuarios');
    }

    public function delete(idModelRequest $request)
    {
        try {
            $usuario = Usuario::where('id', $request->id)->first();
            $usuario->fill([
                'estado' => 0
            ])->save();
            return 'ok';
        } catch (Exception $e) {

        }

    }

    public function consultar(ParametersRequest $request){

        $campo = $request->get('campo');
        $termino = $request->get('termino');

        $usuarios = DB::select("select usuarios.id, usuarios.nombre, usuarios.apellido, usuarios.documento
                    from usuarios where ".$campo." like '%".$termino."%' order by nombre");

        return $usuarios;

    }

} 