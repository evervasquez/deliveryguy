<?php
use domain\social\GoogleManager;
use domain\social\FacebookManager;

class AuthSocialController extends \BaseController
{
    protected $google;
    protected $facebook;

    function __construct(GoogleManager $google, FacebookManager $facebook)
    {
        $this->google = $google;
        $this->facebook = $facebook;
    }


    public function fbLogin()
    {
        return $this->facebook->loginWithFacebook();
    }

    public function fbCallback()
    {
        $code = Input::get('code');
        return $this->facebook->manageCallback($code);
    }
}