<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LibroRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
	        'titulo' => 'required',
	        'fecha_registro' => 'required',
	        'idioma' => 'required',
	        'num_paginas' => 'required',
	        'ejemplares' => 'required',
	        'isbn' => 'required',
	        'pais_impreso' => 'required',
	        'anho_edicion' => 'required',
	        'categoria_id' => 'required',
	        'autor_id' => 'required',
	        'editorial_id' => 'required',
	        'ubicacion_id' => 'required',
            'estado' => ''
        ];
    }
}
