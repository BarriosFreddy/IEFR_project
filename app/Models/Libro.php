<?php
/**
 * Created by PhpStorm.
 * User: freddy
 * Date: 17/06/15
 * Time: 17:07
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Libro extends Model{

	protected $fillable=[
		'titulo',
		'fecha_registro',
		'idioma',
		'num_paginas',
		'ejemplares',
		'isbn',
		'pais_impreso',
		'anho_edicion',
		'categoria_id',
		'autor_id',
		'editorial_id',
		'ubicacion_id',
        'estado'
	];
} 