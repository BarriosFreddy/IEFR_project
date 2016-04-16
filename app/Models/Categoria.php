<?php
/**
 * Created by PhpStorm.
 * User: freddy
 * Date: 18/06/15
 * Time: 17:40
 */

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{
	protected $fillable = [
		'nombre',
        'estado'
	];

} 