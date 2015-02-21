<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 20/02/15
 * Time: 23:34
 */
use domain\delivery\Base\SocialBaseManager;

class FacebookManager extends SocialBaseManager
{

    function getRules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees'
        ];

        return $rules;
    }

}