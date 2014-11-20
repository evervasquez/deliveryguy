<?php

Route::get('/', function()
{
    if(Auth::check())
    {
        return View::make('index');
    }else{
        return View::make('layout');
    }
});

//login
Route::get('sign-in', ['as' => 'sign-in', 'uses' => 'UserLoginController@index']);
Route::post('login', ['as' => 'login', 'uses' => 'UserLoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'UserLoginController@logout']);


//companies
Route::get('companies', ['as' => 'companies', 'uses' => 'CompaniesController@index']);
Route::post('companies/create', ['as' => 'companies.create', 'uses' => 'CompaniesController@create']);

