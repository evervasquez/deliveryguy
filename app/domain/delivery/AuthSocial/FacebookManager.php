<?php
namespace domain\delivery\AuthSocial;

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