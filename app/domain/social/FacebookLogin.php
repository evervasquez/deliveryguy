<?php

namespace domain\social;

interface FacebookLogin
{
    /**
     * login to facebook
     * @return mixed
     */
    public function login();

    /**
     * return to callback
     * @param $code
     * @return mixed
     */
    public function callback($code);

    /**
     * logout to facebook
     * @return mixed
     */
    public function logout();
}