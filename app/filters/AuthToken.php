<?php

/*
 *
 *  * Copyright (C) 2015 eveR Vásquez.
 *  *
 *  * Licensed under the Apache License, Version 2.0 (the "License");
 *  * you may not use this file except in compliance with the License.
 *  * You may obtain a copy of the License at
 *  *
 *  *      http://www.apache.org/licenses/LICENSE-2.0
 *  *
 *  * Unless required by applicable law or agreed to in writing, software
 *  * distributed under the License is distributed on an "AS IS" BASIS,
 *  * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  * See the License for the specific language governing permissions and
 *  * limitations under the License.
 *
 */

use domain\delivery\Token\Token;
use Carbon\Carbon;
use domain\delivery\User\User;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use domain\social\GoogleLogin;
use domain\social\FacebookLogin;

class AuthToken
{
    protected $google;
    protected $facebook;

    function __construct(GoogleLogin $google, FacebookLogin $facebook)
    {
        $this->google = $google;
        $this->facebook = $facebook;
    }


    public function filter($route, $request)
    {
        $authenticated = false;

        //region LOGIN OR CREATE TOKEN
        if ($email = $request->getUser() && $password = $request->getPassword()) {
            $credentials = array('email' => $request->getUser(), 'password' => $request->getPassword());
            if (Auth::once($credentials)) {
                $authenticated = true;
                if (!Auth::user()->tokens()->where('client', BrowserDetect::toString())->first()) {
                    $this->makeToken();
                }
            }
        }
        //endregion


        //TODO: PROBAR TOKEN CUANDO
        //region AUTH TOKEN
        if ($payload = $request->header('X-Auth-Token')) {
            $token = Token::valid()->where('api_token', $payload)
                ->where('client', BrowserDetect::toString())
                ->first();
            if ($token) {
                $today = Carbon::now();
                $parseExpire = Carbon::parse($token->expires_on);

                //expire time_out
                if ($today->diffInSeconds($parseExpire) >= 0) {
                    Sentry::login($token->user);
                    $authenticated = true;
                } else {
                    //login de usuario anterior
                    $user = User::find($token->user_id);
                    Auth::login($user);

                    //preguntamos si es el mismo cliente
                    if ($token->client == BrowserDetect::toString()) {
                        $authenticated = true;
                        $this->makeToken();
                    } else {
                        $authenticated = false;
                    }
                }

            }
        }
        //endregion


        //region AUTH SOCIAL
        if ($authenticated && !Sentry::check()) {
            Sentry::login(Auth::user());
        }
        //endregion


        //region CHECK ERROR
        if (!$authenticated) {
            $response = Response::json([
                'error' => true,
                'message' => 'Not authenticated',
                'code' => 401],
                401
            );
            $response->header('Content-Type', 'application/json');
            return $response;
        }
        //endregion
    }

    /**
     * method make token
     */
    private function makeToken()
    {
        $token = [];
        $token['api_token'] = hash('sha256', Str::random(10), false);
        $token['client'] = BrowserDetect::toString();
        $token['expires_on'] = Carbon::now()->addDay()->toDateTimeString();
        Auth::user()->tokens()->save(new Token($token));
    }
}