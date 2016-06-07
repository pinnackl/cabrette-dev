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
Route::get('login', ['as' => 'login', 'uses' => 'LoginUserController@index']);
Route::get('signup', ['as' => 'signup.index', 'uses' => 'LoginUserController@signup']);
Route::post('signup', ['as' => 'signup.store', 'uses' => 'LoginUserController@store']);
Route::post('admin', ['as' => 'login.store', 'uses' => 'LoginController@store']);

Route::get('logout', ['as' => 'login.destroy', 'uses' => 'LoginController@destroy']);

Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::resource('posts', 'PostController');
        Route::resource('events', 'EventController');
        Route::resource('medias', 'MediaController');
        Route::resource('announces', 'AnnounceController');
        Route::resource('courses', 'CourseController');

    });

    Route::group(['middleware' => 'user', 'namespace' => 'User', 'prefix' => 'user'], function () {

    });


    Route::group(['middleware' => 'partner', 'namespace' => 'Partner', 'prefix' => 'partner'], function () {

    });
});
