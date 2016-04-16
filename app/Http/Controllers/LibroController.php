<?php namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editorial;
use App\Models\Libro;
use App\Models\Ubicacion;
use App\Http\Requests;
use App\Http\Requests\LibroRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Util\Data;
use App\Http\Requests\ParametersRequest;


class LibroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorias = Categoria::all();
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $ubicaciones = Ubicacion::all();


        $books = DB::select("SELECT libros.id, libros.titulo, libros.fecha_registro as fecha, libros.isbn, libros.pais_impreso as pais,"."
                                libros.anho_edicion as anho, libros.idioma, libros.num_paginas as paginas, libros.ejemplares, categorias.nombre as categoria,
                                concat(autors.nombre, autors.apellido) as autor, editorials.nombre as editorial, ubicacions.nombre as ubicacion, libros.estado
                                FROM
                                ((((libros INNER JOIN categorias ON libros.categoria_id = categorias.id)
                                INNER JOIN autors ON libros.autor_id = autors.id)
                                INNER JOIN editorials ON libros.editorial_id = editorials.id)
                                INNER JOIN ubicacions ON libros.ubicacion_id = ubicacions.id)
                                 ORDER BY titulo");

        $libros = json_encode($books);

        return view('biblioteca.libros.index', compact('libros', 'categorias', 'autores', 'editoriales', 'ubicaciones'));

    }

    public function create()
    {
        $paises = Data::paises();
        $idiomas = Data::idiomas();


        $categorias = DB::select('select * from categorias WHERE categorias.estado = "ACTIVO" order by nombre');
        $autores = DB::select('select * from autors WHERE autors.estado = "ACTIVO" order by apellido');
        $editoriales = DB::select('select * from editorials WHERE editorials.estado = "ACTIVO" order by nombre');
        $ubicaciones = DB::select('select * from ubicacions WHERE ubicacions.estado = "ACTIVO" order by nombre');

        return view('biblioteca.libros.create', compact('paises', 'idiomas', 'categorias', 'autores', 'editoriales', 'ubicaciones'));
    }

    public function store(LibroRequest $request)
    {
        try {
            Libro::create($request->all());
            return redirect('biblioteca/libros');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return Redirect::to('biblioteca/categorias/create');
        }
    }

    public function show($id)
    {
        $libro = Libro::find($id);
        $categorias = Categoria::all();
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $ubicaciones = Ubicacion::all();
        return view('biblioteca.libros.show', compact('libro', 'categorias', 'autores', 'editoriales', 'ubicaciones'));
    }

    public function edit($id)
    {
        $paises =  Data::paises();
        $idiomas =  Data::idiomas();

        $categorias = Categoria::all();
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $ubicaciones = Ubicacion::all();
        $libro = Libro::find($id);
        return view('biblioteca.libros.edit', compact('libro', 'paises', 'idiomas', 'categorias', 'autores', 'editoriales', 'ubicaciones'));
    }

    public function update($id, LibroRequest $request)
    {
        $paises =  Data::paises();
        $idiomas =  Data::idiomas();
        $categorias = Categoria::all();
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $ubicaciones = Ubicacion::all();

        try {
            $libro = Libro::find($id);
            $libro->update($request->all());
            return redirect('biblioteca/libros');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return view('biblioteca.libros.edit', compact('libro', 'paises', 'idiomas', 'categorias', 'autores', 'editoriales', 'ubicaciones'));

        }
    }

    public function destroy($id)
    {
        Libro::destroy($id);
        return redirect('biblioteca/libros');
    }

    public function search(SearchRequest $request)
    {
        $valor = $request->get('valor');

        $libros = DB::select("select * from libros where titulo like '%$valor%' OR"."
		                                                 isbn like '%$valor%' OR
	                                                     pais_impreso like '%$valor%' or
		                                                 categoria_id = (select id from categorias where nombre like '%$valor%') or
		                                                 ubicacion_id = (select id from ubicacions where nombre like '%$valor%') or
		                                                 editorial_id = (select id from editorials where nombre like '%$valor%') or
		                                                 autor_id = (select id from autors where nombre like '%$valor%') or
                                                         autor_id = (select id from autors where apellido like '%$valor%')
		                                                 order by titulo");

        $categorias = Categoria::all();
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $ubicaciones = Ubicacion::all();


        return view('biblioteca.libros.index', compact('libros', 'categorias', 'autores', 'editoriales', 'ubicaciones'));;
    }

    public function consultar(ParametersRequest $request){

        $campo = $request->get('campo');
        $termino = $request->get('termino');

        $libros = DB::select("select * from libros where libros.ejemplares > (select count(libro_id) from prestamos where prestamos.libro_id = libros.id and estado = 1) AND libros.estado = 'ACTIVO' and ".$campo." like '%".$termino."%'order by titulo");

        return $libros;

    }

}
