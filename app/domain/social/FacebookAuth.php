<?php

namespace domain\social;

use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Facebook\GraphUser;

class FacebookAuth implements FacebookLogin
{
        private $redirect_scope = 'public_profile,email';
    /**
     * login to facebook
     * @return mixed
     */
    public function login()
    {
        $helper = new LaravelFacebookRedirectLoginHelper(route('oauth.fb.callback'));
        return \Redirect::to($helper->getLoginUrl(array('scope' => $this->redirect_scope)));
    }

    /**
     * process callback
     * @param $code
     * @return mixed
     * @throws \Facebook\FacebookRequestException
     */
    public function callback($code)
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
        }
        $user = $response->getGraphObject(GraphUser::className());
        return $user;

    }


    /**
     * logout to facebook
     * @return mixed
     */
    public function logout()
    {

    }


}