<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'documento' => 'required',
	        'nombre' => 'required',
	        'apellido' => 'required',
	        'direccion' => 'required',
	        'email' => 'required',
	        'perfil' => 'required',
            'estado'=> ''
        ];
    }
}
