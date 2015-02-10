<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 04/11/14
 * Time: 01:52 AM
 */

namespace delivery\User;


class UserRepository {

    /**
     * metodo permite registrar en sentry
     * @param $manager
     * @param $datos
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerSentry($manager, $datos)
    {
        if ($manager->isValid()) {

            Sentry::register(array(
                'email' => $datos['email'],
                'first_name' => $datos['first_name'],
                'last_name' => $datos['first_name'],
                'password' => $datos['password']
            ));

            //TODO: colocar algoritmo de mandar correo electronico

            return Redirect::route('sign-up-confirmation');

        }else{
            return Redirect::back()->withInput()->withErrors($manager->getErros());
        }

    }
} 