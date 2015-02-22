<?php

namespace domain\social;

class GoogleAuth implements GoogleLogin
{
    protected $client;

    function __construct(\Google_Client $client=null)
    {
        $this->client = $client;
        if($this->client){
            $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
            $this->client->setClientSecret('GOOGLE_CLIENT_SECRET');
            $this->client->setRedirectUri(route('oauth.google'));
            $this->client->setScopes('email');
        }
    }


    public function login($code = null)
    {
        $auth = new GoogleAuth($this->client);
        if ( !empty( $code ) ) {

        }
        // if not ask for permission first
        else {

            // return to google login url
            return \Redirect::to($auth->getAuthUrl());
        }
    }

    /**
     * logout to google
     * @return mixed
     */
    public function logout()
    {
        // TODO: Implement logoutWithGoogle() method.
    }

    private function  getAuthUrl(){
        return $this->client->createAuthUrl();
    }
}