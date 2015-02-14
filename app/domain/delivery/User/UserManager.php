<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 04/11/14
 * Time: 01:52 AM
 */

namespace domain\delivery\User;


use domain\delivery\Base\BaseManager;

class UserManager extends BaseManager
{

    public function getRules()
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ];

        return $rules;
    }

} 