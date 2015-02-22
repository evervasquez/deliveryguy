<?php

namespace domain\social;

interface GoogleLogin
{
    /**
     * login to facebook
     * @param $code
     * @return mixed
     */
    public function login($code=null);

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