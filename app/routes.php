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
Route::get('companies/create', ['as' => 'companies.create', 'uses' => 'CompaniesController@create']);
Route::post('companies/store', ['as' => 'companies.store', 'uses' => 'CompaniesController@store']);
Route::get('companies/getAll', ['as' => 'companies.getAll', 'uses' => 'CompaniesController@getAll']);

//Rest android
Route::resource("companies","CompaniesController");

/*
 * API DE DELIVERYGUY
 */
Route::resource("api/v1/companies","CompaniesGuyApiController");
Route::resource("api/v1/employees","EmployeesGuyApiController");

Route::get('push',function(){
    $token="APA91bF2pwcvs1QlAcQM2NGGIBOiT7aJvyTU_eegXjCTTMClsckVkKku31voBwZVcoa-tCShnvqhQfLWkj5IoSwksVh29-luvR-5ZtxhdgSgoxPe7YA6un_kGMcAGdT3ACe8foq2MIWvowTK1tuzb8XqG5b32bt84oT_ZCH6qLR9TDg3ImRtfgs";

    PushNotification::app('appNameAndroid')
        ->to($token)
        ->send('Hello World');
});