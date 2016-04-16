<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\PrestamoRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Controllers;

class PrestamoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
		//$prestamos = Prestamo::all()->where('estado', 1);

        $pres = DB::select("SELECT prestamos.id, prestamos.fecha_entrega, prestamos.fecha_devolucion_max, prestamos.fecha_devolucion,".
                                "prestamos.comentario, prestamos.estado, libros.titulo as libro, concat(usuarios.nombre, ' ', usuarios.apellido) as usuario, usuarios.documento"."
                                 FROM
                                ((prestamos INNER JOIN libros ON prestamos.libro_id = libros.id)
                                INNER JOIN usuarios ON prestamos.usuario_id = usuarios.id) WHERE prestamos.estado = 1");
        $prestamos = json_encode($pres);
	    $libros = DB::select("SELECT * FROM libros");
	    $usuarios = Usuario::all();

	    return view('biblioteca.prestamos.index', compact('prestamos', 'libros', 'usuarios'));
    }

    public function create()
    {
        $fechaEntrega = Carbon::now()->toDateString();
	    $fechaDevolucion = Carbon::now()->addDays(3)->toDateString();
        $usuarios = Usuario::all();
	    $libros= DB::select("select * from libros  where libros.ejemplares > (select count(libro_id) from prestamos where prestamos.libro_id = libros.id and estado = 1) AND libros.estado = 'ACTIVO'");
	    $estado = true;

	    return view('biblioteca.prestamos.create', compact('usuarios', 'libros', 'fechaEntrega', 'fechaDevolucion', 'estado'));
    }

    public function store(PrestamoRequest $request)
    {
    try {
        Prestamo::create($request->all());
        return redirect('biblioteca/prestamos');
    }catch (PDOException $e){
       echo("Error en la base de datos".$e->getMessage());
    }catch(QueryException $ex){
        echo("Error en la base de datos".$ex->getMessage());
    }


    }

    public function show($id)
    {
        $prestamo = Prestamo::find($id);
	    $usuarios = Usuario::all();
	    $libros = Libro::all();


	   return view('biblioteca.prestamos.show', compact('prestamo', 'usuarios', 'libros'));
    }

    public function edit($id)
    {
	    $fecha = Carbon::now()->toDateString();
	    $usuarios = Usuario::all();
	    $libros= Libro::all();
	    $prestamo = Prestamo::find($id);
	    $prestamo->estado = 0;
        return view('biblioteca.prestamos.edit', compact('prestamo', 'usuarios', 'libros', 'fecha'));
    }

    public function update($id, PrestamoRequest $request)
    {
	    $prestamo = Prestamo::find($id);
	    $prestamo->update($request->all());
	    return redirect('biblioteca/prestamos');
    }

    public function destroy($id)
    {
        //
    }

    public function historical()
    {
        $pres = DB::select("SELECT prestamos.id, prestamos.fecha_entrega, prestamos.fecha_devolucion_max, prestamos.fecha_devolucion,
                                prestamos.comentario, prestamos.estado, libros.titulo as libro, concat(usuarios.nombre, usuarios.apellido) as usuario
                                 FROM
                                ((prestamos INNER JOIN libros ON prestamos.libro_id = libros.id)
                                INNER JOIN usuarios ON prestamos.usuario_id = usuarios.id) WHERE prestamos.estado = 0
                                ");
        $prestamos = json_encode($pres);

        return view('biblioteca.prestamos.historical', compact('prestamos'));
    }

	public  function  search(SearchRequest $request)
	{
		$valor =  $request->get('valor');

		$prestamos = DB::select("select * from prestamos where usuario_id = (select id from usuarios where nombre like '%$valor%' )
		                                                	 order by fecha_entrega");

		$libros = Libro::all();
		$usuarios = Usuario::all();

		return view('biblioteca.prestamos.index', compact('prestamos', 'libros', 'usuarios'));

	}
}
