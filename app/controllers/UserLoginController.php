<?php

class UserLoginController extends \BaseController
{

    public function index()
    {
        return View::make('sign-in');
    }

    public function login()
    {

        // Guardamos en un arreglo los datos del usuario.

        $rules = [
            'username' => 'required|alpha_dash|min:4',
            'password' => 'required|alpha_dash|min:3'
        ];

        $inputCheck = Input::get('remember');
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        $validator = Validator::make($userdata, $rules);

        if ($validator->passes()) {
            // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
            if (Auth::attempt($userdata, ($inputCheck == 'on') ? true : false))
            {

                // De ser datos válidos nos mandara a la bienvenida
                return Redirect::to('/');
                //return View::make('hello');

            } else {

                // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
                //Session::flash('message', 'Datos incorrectos!');
                return Redirect::to('/')->with('error','Datos incorrectos');
            }
        }else{
            return \Redirect::back()->withInput()->withErrors($validator->errors());
        }

    }

    public function logout()
    {
        Auth::logout();
        Session::flash('global', 'Sesión finalizada ');
        return Redirect::to('/');
    }
}