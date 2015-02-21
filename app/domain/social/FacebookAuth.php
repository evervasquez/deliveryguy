<?php

namespace domain\social;

use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;

class FacebookAuth implements FacebookManager
{
    private $helper;

    /**
     * login to facebook
     * @return mixed
     */
    public function loginWithFacebook()
    {
        $this->helper = new LaravelFacebookRedirectLoginHelper(route('oauth.fb.callback'));
        $permissions = ['email']; // optional
        $loginUrl = $this->helper->getLoginUrl(route('oauth.fb.callback'),$permissions);
        return \Redirect::to($loginUrl);
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
            return \Redirect::route('sign-up')->with('message', 'There was an error communicating with Facebook');
        }

        $helper = new LaravelFacebookRedirectLoginHelper(route('oauth.fb.callback'),
            getenv('FACEBOOK_CLIENT_ID'),
            getenv('FACEBOOK_CLIENT_SECRET'));

        try {
            $session = $helper->getSessionFromRedirect();
        } catch (FacebookRequestException $ex) {
            // When Facebook returns an error
        } catch (\Exception $ex) {
            // When validation fails or other local issues
        }
        if ($session) {
            // Logged in
            $request = new FacebookRequest($session, 'GET', '/me');
            $response = $request->execute();
            $graphObject = $response->getGraphObject();
        }

        return $graphObject;

    }


    /**
     * logout to facebook
     * @return mixed
     */
    public function logoutWithFacebook()
    {

    }


}