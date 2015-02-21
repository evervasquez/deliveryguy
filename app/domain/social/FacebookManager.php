<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 19/02/15
 * Time: 23:50
 */

namespace domain\social;


interface FacebookManager
{
    /**
     * login to facebook
     * @return mixed
     */
    public function loginWithFacebook();

    /**
     * return to callback
     * @param $code
     * @return mixed
     */
    public function manageCallback($code);

    /**
     * logout to facebook
     * @return mixed
     */
    public function logoutWithFacebook();
}