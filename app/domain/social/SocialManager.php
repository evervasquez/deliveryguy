<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 19/02/15
 * Time: 10:22
 */
namespace domain\social;
interface SocialManager {
    public function loginWithGoogle();
    public function loginWithFacebook();
}