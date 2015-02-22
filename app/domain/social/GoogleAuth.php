<?php

namespace domain\social;


use Artdarek\OAuth\Facade\OAuth;

class GoogleAuth implements GoogleLogin
{

    public function login($code = null)
    {
        // get google service
        $googleService = OAuth::consumer('Google',route('oauth.google'));

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from google, get the token
            $googleService->requestAccessToken($_GET['code']);

            $url = $googleService->getAuthorizationUri();

            // Send a request with it
            $result = json_decode( $googleService->request('https://www.googleapis.com/oauth2/v1/userinfo' ), true );

            if(!empty($token)){

                dd($result);

            }

        }
        // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to facebook login url
            return \Redirect::to( (string)$url );
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

}