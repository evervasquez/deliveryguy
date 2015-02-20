<?php
namespace domain\social;

interface GoogleManager {

    /**
     * login to google
     * @return mixed
     */
    public function loginWithGoogle();

    /**
     * logout to google
     * @return mixed
     */
    public function logoutWithGoogle();

}