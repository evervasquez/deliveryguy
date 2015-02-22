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

    /**
     * initialize object
     */
    private function init()
    {
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(route('oauth.google.callback'));
        $this->client->setScopes(array(\Google_Service_Oauth2::PLUS_LOGIN,
            \Google_Service_Oauth2::USERINFO_EMAIL,
            \Google_Service_Oauth2::USERINFO_PROFILE,
            \Google_Service_Oauth2::PLUS_ME
        ));
    }

    /**
     * login
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        return \Redirect::to($this->getAuthUrl());
    }

    /**
     * logout to google
     * @return mixed
     */
    public function logout()
    {
        \Session::forget('token');
    }

    /**
     * get url to redirect
     * @return string
     */
    private function  getAuthUrl()
    {
        return $this->client->createAuthUrl();
    }


    /**
     * verify is logged
     * @return bool|string
     */
    private function isLoggedIn()
    {
        if (\Session::has('token')) {
            $this->client->setAccessToken(\Session::get('token'));
            return true;
        }
        return $this->client->getAccessToken();
    }

    public function callback($code)
    {
        if (isset($code)) {
            $this->client->authenticate($code);
            $token = $this->client->getAccessToken();
            \Session::put('token', $token);
        }

        if ($this->isLoggedIn()) {
            $oauth = new \Google_Service_Oauth2($this->client);
            return $oauth->userinfo->get();
        } // if not ask for permission first
        else {
            // return to google login url
            return \Redirect::to($this->getAuthUrl());
        }
    }


}