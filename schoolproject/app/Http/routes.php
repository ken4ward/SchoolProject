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

// Route::get('users', ['as' => 'index', 'uses' => 'UserController@index']);

// Route::get('users/create', ['as' => 'create', 'uses' => 'UserController@create']);

// Route::post('users/create', ['as' => 'store', 'uses' => 'UserController@store']);

// Route::get('users/$id', ['as' => 'show', 'uses' => 'UserController@show']);

Route::resource('users', 'UserController');
