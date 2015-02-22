<?php

namespace domain\social;

class GoogleAuth implements GoogleLogin
{
    protected $client;

    public function login($code = null)
    {
        $this->client = new \Google_Client();
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(route('oauth.google'));
        $this->client->setScopes('email');

        if ($this->checkRedirectCode($code)) {

            dd($this->getPayLoad());

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

    private function checkRedirectCode($code)
    {

        if (isset($code)) {
            
            $token = $this->client->getAccessToken();

            dd($token);

            $this->client->authenticate($code);

            $this->setToken($this->client->getAccessToken());

            return true;
        }

        return false;
    }

    private function setToken($token)
    {
        //\Session::put('access_token',$token);
        $this->client->setAccessToken($token);
    }

    private function getPayLoad()
    {
        $ticket = $this->client->verifyIdToken($this->client->getAccessToken());
        if($ticket){
            $data = $ticket->getAttributes();
            return $data;
        }
        return false;
    }
}