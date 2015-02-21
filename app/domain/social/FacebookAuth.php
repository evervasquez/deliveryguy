<?php

namespace domain\social;

use Facebook\FacebookRequest;

class FacebookAuth implements FacebookManager
{
    private $helper;
    private $session;

    /**
     * login to facebook
     * @return mixed
     */
    public function loginWithFacebook()
    {
        $this->helper = new LaravelFacebookRedirectLoginHelper(route('oauth.fb.callback'));
        $this->session = $this->helper->getSessionFromRedirect();
        return \Redirect::to($this->helper->getLoginUrl());
    }

    /**
     * callback
     * @param $code
     * @return mixed
     * @throws \Facebook\FacebookRequestException
     */
    public function manageCallback($code)
    {
        if (strlen($code) == 0) {
            return Redirect::route('sign-up')->with('message', 'There was an error communicating with Facebook');
        }

        if ($this->session) {
            $request = new FacebookRequest($this->session, 'GET', '/me');
            $response = $request->execute();
            dd($response);
        }
    }


    /**
     * logout to facebook
     * @return mixed
     */
    public function logoutWithFacebook()
    {

    }


}