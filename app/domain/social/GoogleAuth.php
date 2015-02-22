<?php

namespace domain\social;

class GoogleAuth implements GoogleLogin
{
    protected $client;

    function __construct(\Google_Client $client)
    {
        $this->client = $client;
        $this->init();
    }

    private function init(){
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(route('oauth.google'));
        $this->client->setScopes('email');
    }

    public function login($code = null)
    {
        if(isset($code)){
            $this->client->authenticate($code);
            $token = $this->client->getAccessToken();
            \Session::put('token',$token);
        }

        if ($this->isLoggedIn()) {

            echo '<pre>';print_r($this->getPayLoad());exit;

        } // if not ask for permission first
        else {
            // return to google login url
            return \Redirect::to($this->getAuthUrl());
        }
    }


    /**
     * logout to google
     * @return mixed
     */
    public function logout()
    {
        \Session::forget('token');
    }

    private function  getAuthUrl()
    {
        return $this->client->createAuthUrl();
    }

    // app/src/GA_Service.php
    public function isLoggedIn(){
        if (\Session::has('token')) {
            $this->client->setAccessToken(\Session::get('token'));
            return true;
        }

        return $this->client->getAccessToken();
    }

    private function getPayLoad()
    {
        $payload = $this->client->verifyIdToken()->getAttributes();
        return $payload;
    }
}