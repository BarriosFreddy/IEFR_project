<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\loginRequest;
use App\Http\Requests\resetPasswordRequest;
use App\Http\Controllers\Controller;

class loginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function store(loginRequest $request)
    {
        if(Auth::attempt(['email'=>$request->get('email'), 'password'=>$request->get('password'),'rol'=>$request->get('rol'), 'estado' => 'ACTIVO'])){
                return Redirect::to('biblioteca');
        }else{
            Session::flash('datosIncorrectos', "Los datos ingresados no se encuentran en nuestra base de datos" );
            return Redirect::to('auth/login');
        }
    }



    public function logout()
    {
        Auth::logout();
        return Redirect::to('auth/login');
    }


}
