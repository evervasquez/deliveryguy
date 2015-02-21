<?php

namespace domain\social;

use Facebook\FacebookRequest;
use Facebook\GraphUser;

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
        $this->helper = new LaravelFacebookRedirectLoginHelper(route('oauth.fb.callback'),getenv('FACEBOOK_CLIENT_ID'),getenv('FACEBOOK_CLIENT_SECRET'));
        try {
            $session = $this->helper->getSessionFromRedirect();
        } catch(FacebookSDKException $e) {
            $session = null;
        }

        if($session) {

            try {

                $user_profile = (new FacebookRequest(
                    $session, 'GET', '/me'
                ))->execute()->getGraphObject(GraphUser::className());

                echo "Name: " . $user_profile->getName();

            } catch(FacebookRequestException $e) {

                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();

            }

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