<?php
/**
 * Created by PhpStorm.
 * User: freddy
 * Date: 20/06/15
 * Time: 10:15
 */

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model{
	protected $fillable = [
		'nombre',
        'estado'
	];
} 