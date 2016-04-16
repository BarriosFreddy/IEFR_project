<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editorial;
use App\Models\Libro;
use App\Models\Ubicacion;
use App\Http\Requests;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;

class CatalogoController extends Controller
{

    public function viewSearch()
    {
        $dataLibros = null;
        return view('busqueda.catalogo', compact( 'dataLibros'));
    }

    public function showSearch(SearchRequest $request)
    {
        $valor = $request->get('valor');

        $libros = DB::select("SELECT libros.id, libros.titulo, libros.fecha_registro as fecha, libros.isbn, libros.pais_impreso as pais,
                                libros.anho_edicion as anho, libros.idioma, libros.num_paginas as paginas, libros.ejemplares, categorias.nombre as categoria,
                                concat(autors.nombre, autors.apellido) as autor, editorials.nombre as editorial, ubicacions.nombre as ubicacion
                                FROM
                                ((((libros INNER JOIN categorias ON libros.categoria_id = categorias.id)
                                INNER JOIN autors ON libros.autor_id = autors.id)
                                INNER JOIN editorials ON libros.editorial_id = editorials.id)
                                INNER JOIN ubicacions ON libros.ubicacion_id = ubicacions.id) WHERE libros.titulo like '%$valor%' OR
                                 libros.isbn like '%$valor%' OR
                                 libros.pais_impreso like '%$valor%' or
                                 libros.categoria_id = (SELECT id from categorias WHERE categorias.nombre like '%$valor%') or
                                 libros.ubicacion_id = (SELECT id from ubicacions WHERE ubicacions.nombre like '%$valor%') or
                                 libros.editorial_id = (SELECT id from editorials WHERE editorials.nombre like '%$valor%') or
                                 libros.autor_id = (SELECT id from autors WHERE autors.nombre like '%$valor%') or
                                 libros.autor_id = (SELECT id from autors WHERE autors.apellido like '%$valor%')
                                 ORDER BY titulo");

        $dataLibros = json_encode($libros);

        return view('busqueda.catalogo', compact('dataLibros'));

    }
}
