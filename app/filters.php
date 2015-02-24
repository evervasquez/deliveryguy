<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function ($request) {
    //
});

App::after(function ($request, $response) {
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function () {
    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            return Redirect::guest('login');
        }
    }
});


Route::filter('auth.basic', function () {
    return Auth::basic('username');
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function () {
    if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function () {
    if (Session::token() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

use Cartalyst\Sentry\Facades\Laravel\Sentry;

Route::filter('auth.token', function ($route, $request) {
    $authenticated = false;

    //region LOGIN OR CREATE TOKEN
    if ($email = $request->getUser() && $password = $request->getPassword()) {
        $credentials = array('email' => $request->getUser(), 'password' => $request->getPassword());
        if (Auth::once($credentials)) {
            $authenticated = true;
            if (!Auth::user()->tokens()->where('client', BrowserDetect::toString())->first()) {
                $token = [];
                $token['api_token'] = hash('sha256', Str::random(10), false);
                $token['client'] = BrowserDetect::toString();
                $token['expires_on'] = \Carbon\Carbon::now()->addDay()->toDateTimeString();
                Auth::user()->tokens()->save(new \domain\delivery\Token\Token($token));
            }
        }
    }
    //endregion


    //TODO: PROBAR TOKEN CUANDO
    //region AUTH TOKEN
    if ($payload = $request->header('X-Auth-Token')) {
        $token = \domain\delivery\Token\Token::valid()->where('api_token', $payload)
            ->where('client', BrowserDetect::toString())
            ->first();
        if ($token) {
            $today = \Carbon\Carbon::now();
            $parseExpire = \Carbon\Carbon::parse($token->expires_on);

            //expire time_out
            if ($today->diffInSeconds($parseExpire) >= 0) {
                Sentry::login($token->user);
                $authenticated = true;
            } else {

                //login user old
                $user = \domain\delivery\User\User::find($token->user_id);
                Auth::login($user);

                //preguntamos si es el mismo cliente
                if ($token->client == BrowserDetect::toString()) {
                    $authenticated = true;
                    $token = [];
                    $token['api_token'] = hash('sha256', Str::random(10), false);
                    $token['client'] = BrowserDetect::toString();
                    $token['expires_on'] = \Carbon\Carbon::now()->addDay()->toDateTimeString();
                    Auth::user()->tokens()->save(new \domain\delivery\Token\Token($token));
                } else {
                    $authenticated = false;
                }
            }

        }
    }
    //endregion


    //REGION AUTH SOCIAL

    if ($authenticated && !Sentry::check()) {
        Sentry::login(Auth::user());
    }

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
});