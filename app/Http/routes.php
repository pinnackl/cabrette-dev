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

Route::get('admin', ['as' => 'login.index', 'uses' => 'LoginController@index']);
Route::post('admin', ['as' => 'login.store', 'uses' => 'LoginController@store']);
Route::get('logout', ['as' => 'login.destroy', 'uses' => 'LoginController@destroy']);

Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);

Route::get('work', ['as' => 'work', 'uses' => 'WorkController@index']);

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::resource('users', 'UserController');
        Route::resource('posts', 'PostController');
    });
});