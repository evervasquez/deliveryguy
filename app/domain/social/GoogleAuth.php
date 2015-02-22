<?php

namespace domain\social;


class GoogleAuth implements GoogleLogin
{

    public function login($code = null)
    {
        // get google service
        $googleService = \OAuth::consumer('Google',route('oauth/google'));

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken($code);

            // Send a request with it
            $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

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
    }


}