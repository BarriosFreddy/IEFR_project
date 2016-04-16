<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
		protected $fillable = [
			'nombre',
			'apellido',
			'documento',
			'direccion',
			'email',
			'fecha_nacimiento',
			'perfil',
            'estado'
		];
}

