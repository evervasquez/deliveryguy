<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 19/02/15
 * Time: 23:53
 */

namespace domain\social;


class GoogleAuth implements GoogleLogin{
    /**
     * login to google
     * @return mixed
     */
    public function login()
    {
        // TODO: Implement loginWithGoogle() method.
    }

    /**
     * logout to google
     * @return mixed
     */
    public function logout()
    {
        // TODO: Implement logoutWithGoogle() method.
    }

    /**
     * return to callback
     * @param $code
     * @return mixed
     */
    public function callback($code)
    {
        // TODO: Implement callback() method.
    }


}