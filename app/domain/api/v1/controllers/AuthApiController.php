<?php

namespace domain\api\v1\controllers;


class AuthApiController extends ApiBaseController
{

    /**
     * login android and apple the guy
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginGuy()
    {
        $data = \Input::all();
        $error = true;
        $user = array();

        if (\Auth::attempt($data)) {
            $error = false;
            $user = array(
                'id' => \Auth::user()->id,
                'first_name' => \Auth::user()->first_name
            );
        }

        return \Response::json(array(
            'error' => $error,
            'user' => $user
        ), 200);
    }
}