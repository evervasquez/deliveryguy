<?php
namespace domain\delivery\AuthSocial;
use domain\delivery\Base\SocialBaseManager;

class SocialManager extends SocialBaseManager
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