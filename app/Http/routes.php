<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Web', 'middleware' => 'web'], function () {
    Route::get('demo/{tourId}', 'DemoController@index');
    Route::get('demoMenu', 'DemoController@demoMenu');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web']], function () {
    Route::auth();

    Route::group(['middleware' => ['auth.admin']], function () {
        Route::get('/', 'HomeController@index');

        Route::resource('users', 'UsersController');
        Route::post('users/restore/{user}', 'UsersController@restore');

        Route::resource('roles', 'RolesController');
        Route::get('roles/change-permission/{role}', 'RolesController@getChangePermission');
        Route::post('roles/change-permission/{role}', 'RolesController@postChangePermission');
    });
});
