<?php

class ShowViewRegisterController extends \BaseController
{

    public function showViewSendingEmail()
    {
        return View::make('signup-confirmation');
    }

    public function showViewConfirmation(){
        $data = Input::all();

        $employee = \domain\Utils::dataDesencriptar($data);

        //quitamos el ultimo registro del array
        $key = array_pop($employee);

        //sacamos sha1
        $encript = sha1(implode('|', $employee));

        //dd($key.'-----'.$encript);

        //comparmos los sha1
        if ($encript == $key) {
            return View::make('confirmation_employee', compact('employee'));
        } else {
            return \Redirect::to('/')->with('error', 'Autentification Failed');
        }
    }

}