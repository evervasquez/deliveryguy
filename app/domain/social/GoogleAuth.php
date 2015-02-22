<?php

namespace domain\social;

class GoogleAuth implements GoogleLogin
{
    private $client;
    private $service;

    function __construct()
    {
        $this->client= $this->initGoogle();
    }


    public function initGoogle()
    {
        $client = new \Google_Client();
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(route('oauth.google.callback'));
        $client->setScopes(\Google_Service_Plus::PLUS_ME);
        return $client;
    }

    /**
     * login to google
     * @return mixed
     */
    public function login()
    {
        return \Redirect::to($this->client->createAuthUrl());
    }

    /**
     * logout to google
     * @return mixed
     */
    public function logout()
    {
        // TODO: Implement logoutWithGoogle() method.
    }

    /**
     * return to callback
     * @param $code
     * @return mixed
     */
    public function callback($code)
    {
        if (strlen($code) == 0) {
            return \Redirect::route('sign-up')->with('message', 'There was an error communicating with Facebook');
        }
        $client = $this->initGoogle();
        $plus = new \Google_Service_Plus($client);
        return $plus->people->get('me');
    }


}