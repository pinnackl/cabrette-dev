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

    Route::get('event-calendar',['as' => 'event-calendar',  'uses' =>  'CalendarController@index']);

    Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::resource('posts', 'PostController');
        Route::resource('events', 'EventController');
        Route::resource('medias', 'MediaController');
        Route::resource('announces', 'AnnounceController');
        Route::resource('courses', 'CourseController');
        Route::resource('forums', 'ForumController');
        Route::resource('themes', 'ThemeController');
        Route::resource('pages', 'PageController');

        Route::get('events-all', ['as' => 'event-all', 'uses' => 'EventController@all']);

        Route::get('pages.association', ['as' => 'admin.pages.association', 'uses' => 'PageController@association']);
        Route::get('pages.cabrette', ['as' => 'admin.pages.cabrette', 'uses' => 'PageController@cabrette']);
    });

    Route::group(['middleware' => 'user'], function () {
        Route::get('profile', 'UserController@edit');
        Route::put('profile.update', 'UserController@update');
    });


    Route::group(['middleware' => 'partner', 'namespace' => 'Partner', 'prefix' => 'partner'], function () {

    });
});

Route::resource('courses', 'CourseController');
Route::resource('announces', 'AnnounceController');
Route::resource('forum', 'ForumController');
Route::get('association', ['as' => 'association', 'uses' => 'PageController@association']);
Route::get('cabrette', ['as' => 'cabrette', 'uses' => 'PageController@cabrette']);
Route::get('contact', ['as' => 'contact', 'uses' => 'PageController@contact']);

