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

//test createuser
Route::get('createuser', function(){
    Sentry::register(array(
        'email'    => 'pever@unsm.edu.pe',
        'password' => '123',
        'username'=> 'sonico999'
    ));

    return \delivery\User\User::all();
});

//Home
Route::get('sign-up', ['as' => 'sign-up', 'uses' => 'HomeController@showLayoutSignUp']);


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
Route::resource("api/v1/companies","CompaniesGuyApiController");
Route::resource("api/v1/employees","EmployeesGuyApiController");
Route::resource("api/v1/deliveries","DeliveriesGuyApiController");

