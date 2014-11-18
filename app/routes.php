<?php

Route::get('/', function()
{
    if(Auth::check())
    {
        return View::make('index');
    }else{
        return Redirect::route('/');
    }
});

//login
Route::get('sign-in', ['as' => 'sign-in', 'uses' => 'UserLoginController@index']);
Route::post('login', ['as' => 'login', 'uses' => 'UserLoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'UserLoginController@logout']);