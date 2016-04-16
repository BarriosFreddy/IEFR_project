<?php
/**
 * Created by PhpStorm.
 * User: freddy
 * Date: 21/06/15
 * Time: 17:10
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model{

	protected $fillable =[
		'fecha_entrega',
		'fecha_devolucion_max',
		'fecha_devolucion',
		'comentario',
		'estado',
		'user_id',
		'usuario_id',
		'libro_id',
	];

} 