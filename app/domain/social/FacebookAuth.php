<?php

namespace domain\social;

class FacebookAuth implements FacebookManager
{
    /**
     * login to facebook
     * @return mixed
     */
    public function loginWithFacebook()
    {
        $helper = new LaravelFacebookRedirectLoginHelper(route('oauth.fb.callback'));
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