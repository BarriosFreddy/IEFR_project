<?php
/**
 * Created by PhpStorm.
 * User: freddy
 * Date: 19/06/15
 * Time: 18:50
 */

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Autor extends Model{

	protected $fillable = [
		'nombre',
		'apellido',
		'pais',
        'estado'
	];
} 