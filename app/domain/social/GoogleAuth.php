<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 19/02/15
 * Time: 23:53
 */

namespace domain\social;


class GoogleAuth implements GoogleLogin
{
    private $client;

    function __construct()
    {
        $this->client = new \Google_Client();
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(route('oauth.google.callback'));
        $this->client->addScope("https://www.googleapis.com/auth/urlshortener");
    }


    /**
     * login to google
     * @return mixed
     */
    public function login()
    {
        $service = new \Google_Service_Urlshortener($this->client);
        dd($service);
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
        // TODO: Implement callback() method.
    }


}