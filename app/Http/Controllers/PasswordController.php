<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPassword;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.reset');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResetPasswordRequest $request)
    {
        try {
            $id_user = $request->id_user;
            $new_password = $request->new_password;
            $current_password = $request->current_password;

            $user = User::find($id_user);



            if ($user != null && \Hash::check($current_password, $user->password)) {
                $user->fill([
                    'password' => Hash::make($new_password)
                ])->save();

                Session::flash("success", "success");

            }else{
                Session::flash("error", "error");
            }
            return Redirect::to('biblioteca/password');
        } catch
        (Exception $e) {
            Session::flash("error_general", "error");
            return Redirect::to('biblioteca/password');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function passwordForgot(ForgotPassword $request )
    {
        try {
            $email = $request->email;
            $documento = $request->documento;
            $new_password = $request->new_password;

            $user = User::where('email', $email)
                ->first();



            if ($user != null  && $user->email == $email && $user->documento == $documento) {
                $user->fill([
                    'password' => Hash::make($new_password)
                ])->save();

                Session::flash("success", "success");

            }else{
                Session::flash("error", "error");
            }
            return  view('auth.forgotPassword');
        } catch
        (Exception $e) {
            Session::flash("error_general", "error");
        }
        return view('auth.forgotPassword');

    }
    public function passwordForgotView( )
    {
        return view('auth.forgotPassword');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
