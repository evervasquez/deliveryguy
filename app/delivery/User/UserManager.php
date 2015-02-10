<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 04/11/14
 * Time: 01:52 AM
 */

namespace delivery\User;


use delivery\Base\BaseManager;

class UserManager extends BaseManager
{

    public function getRules()
    {
        $rules = [
            'first_name' => 'required|min:8',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ];

        return $rules;
    }

} 