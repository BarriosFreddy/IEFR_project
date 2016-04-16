<?php

namespace App\Http\Requests;

use App\Http\Requests;

class PrestamoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'fecha_entrega' => 'required',
	        'fecha_devolucion_max' => 'required',
	        'fecha_devolucion' ,
	        'comentario' => 'min:5',
	        'estado' => 'required',
	        'user_id' => 'required',
	        'usuario_id' => 'required',
	        'libro_id' => 'required',
        ];
    }
}
