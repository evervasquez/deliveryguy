<?php

namespace domain\social;

class GoogleAuth implements GoogleLogin
{
    protected $client;
    protected $auth;

    public function login($code = null)
    {
        $client = new \Google_Client();
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(route('oauth.google'));
        $client->setScopes('email');

        if ($this->checkRedirectCode($client,$code)) {

            dd($this->getPayLoad($client));

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
        \Session::forget('access_token');
    }

    private function  getAuthUrl()
    {
        return $this->client->createAuthUrl();
    }

    private function checkRedirectCode($client,$code)
    {

        if (isset($code)) {

            $client->authenticate($code);

            $this->setToken($client,$client->getAccessToken());


            return true;
        }

        return false;
    }

    private function setToken($client,$token)
    {
        //\Session::put('access_token',$token);
        $client->setAccessToken($token);
    }

    private function getPayLoad($client)
    {
        $ticket = $client->verifyIdToken($client->getAccessToken());
        if($ticket){
            $data = $ticket->getAttributes();
            return $data;
        }
        return false;
    }
}