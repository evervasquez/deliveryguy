<?php

namespace domain\social;

use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;

class FacebookAuth implements FacebookManager
{
    /**
     * login to facebook
     * @return mixed
     */
    public function loginWithFacebook()
    {
        FacebookSession::setDefaultApplication(getenv('FACEBOOK_CLIENT_ID'),getenv('FACEBOOK_CLIENT_SECRET'));
        $helper = new FacebookRedirectLoginHelper('oauth/fb/callback');
        return \Redirect::to($helper->getLoginUrl());
    }

    /**
     * logout to facebook
     * @return mixed
     */
    public function logoutWithFacebook()
    {

    }

}