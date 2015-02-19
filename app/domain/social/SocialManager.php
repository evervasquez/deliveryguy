<?php
namespace domain\social;

interface SocialManager {

    /**
     * login to google
     * @return mixed
     */
    public function loginWithGoogle();

    /**
     * login to facebook
     * @return mixed
     */
    public function loginWithFacebook();
}