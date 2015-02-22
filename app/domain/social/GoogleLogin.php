<?php

namespace domain\social;

interface GoogleLogin
{
    /**
     * login to facebook
     * @return mixed
     */
    public function login();

    /**
     * logout to facebook
     * @return mixed
     */
    public function logout();

    public function callback($code);
}