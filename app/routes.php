<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return View::make('index');
    } else {
        return View::make('layout');
    }
});

Route::get('php', function () {
    return View::make('php-version');
});

/**
 * register
 */
// action form
Route::post('employee/sign-up', ['as' => 'employee.sign-up', 'uses' => 'EmployeesController@create']);
Route::post('company/sign-up', ['as' => 'company.sign-up', 'uses' => 'CompaniesController@create']);

//confirmation
Route::get('confirmation', ['as' => 'confirmation', 'uses' => 'ShowViewRegisterController@showViewConfirmation']);
Route::post('confirmation', ['as' => 'confirmation.post', 'uses' => 'UsersController@create']);


//redirect confirmation email
Route::get('confirm_email', ['as' => 'showViewSendingEmail', 'uses' => 'ShowViewRegisterController@showViewSendingEmail']);


/**
 * Social register Facebook
 */
Route::get('oauth/fb', ['as' => 'oauth.fb', 'uses' => 'AuthSocialController@fbLogin']);
Route::get('oauth/fb/callback', ['as' => 'oauth.fb.callback', 'uses' => 'AuthSocialController@fbCallback']);

/**
 * Social register Google
 */
Route::get('oauth/google', ['as' => 'oauth.google', 'uses' => 'AuthSocialController@googleLogin']);
Route::get('oauth/google/callback', ['as' => 'oauth.google.callback', 'uses' => 'AuthSocialController@googleCallback']);


//Home
Route::get('sign-up', ['as' => 'sign-up', 'uses' => 'HomeController@showLayoutSignUp']);

//register
//Route::post('sign-up', ['as' => 'sign-up', 'uses' => 'UsersController@create']);
Route::get('sign-up-confirmation', ['as' => 'sign-up-confirmation', 'uses' => 'HomeController@signUpConfirmation']);


//login
Route::get('sign-in', ['as' => 'sign-in', 'uses' => 'UserLoginController@index']);
Route::post('login', ['as' => 'login', 'uses' => 'UserLoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'UserLoginController@logout']);

//companies
Route::get('companies', ['as' => 'companies', 'uses' => 'CompaniesController@index']);
Route::get('companies/create', ['as' => 'companies.create', 'uses' => 'CompaniesController@create']);
Route::post('companies/store', ['as' => 'companies.store', 'uses' => 'CompaniesController@store']);
Route::get('companies/getAll', ['as' => 'companies.getAll', 'uses' => 'CompaniesController@getAll']);

//Employees
Route::get('user/employee', ['as' => 'employee', 'uses' => 'EmployeesController@index']);

//deliveries
//companies
Route::get('deliveries', ['as' => 'deliveries', 'uses' => 'DeliveriesController@index']);
Route::get('deliveries/create', ['as' => 'deliveries.create', 'uses' => 'DeliveriesController@create']);
Route::post('deliveries/store', ['as' => 'deliveries.store', 'uses' => 'DeliveriesController@store']);
Route::get('deliveries/getAll', ['as' => 'deliveries.getAll', 'uses' => 'DeliveriesController@getAll']);


/*
 * API DE DELIVERYGUY
 */
//Route::resource("api/v1/companies", "CompaniesGuyApiController");
//Route::resource("api/v1/employees", "EmployeesGuyApiController");
//Route::resource("api/v1/deliveries", "DeliveriesGuyApiController");


Route::group(array('before' => 'auth.token'), function () {
    Route::post('api/v1/user/login', 'domain\api\v1\controllers\AuthApiController@loginGuy');
    Route::get('api/v1/users', 'domain\api\v1\controllers\UserApiController@all');
});

//create user
Route::get('create/user',function(){

    $user = \Cartalyst\Sentry\Facades\Laravel\Sentry::createUser(array(
        'email'     => 'test@example.com',
        'password'  => 'test',
        'activated' => true,
    ));

    return $user;
});