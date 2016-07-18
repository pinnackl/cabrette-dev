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

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('password/reset', 'Auth\PasswordController@getEmail');


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
        Route::resource('forums', 'ForumController');
        Route::resource('themes', 'ThemeController');
        Route::resource('pages', 'PageController');
        Route::resource('comments', 'CommentController');
        Route::resource('images', 'HomeImageController');


        Route::get('pages.association', ['as' => 'admin.pages.association', 'uses' => 'PageController@association']);
        Route::get('pages.cabrette', ['as' => 'admin.pages.cabrette', 'uses' => 'PageController@cabrette']);
    });

    Route::group(['middleware' => 'user'], function () {
        Route::get('profile', 'UserController@edit');
        Route::put('profile.update', 'UserController@update');

        Route::resource('comments', 'CommentController');
        Route::resource('posts', 'PostController');
        Route::resource('annonces', 'AnnonceController');
    });


});

Route::resource('courses', 'CourseController');
Route::resource('announces', 'AnnounceController');
Route::resource('forum', 'ForumController');

Route::get('forum/{theme_id}/subject/{post_id}', ['as' => 'forum.subject.show', 'uses' =>  'ForumSubjectController@show']);
Route::get('association', ['as' => 'association', 'uses' => 'PageController@association']);
Route::get('cabrette', ['as' => 'cabrette', 'uses' => 'PageController@cabrette']);
Route::get('contact', ['as' => 'contact', 'uses' => 'PageController@contact']);
Route::post('contact', ['as' => 'contact', 'uses' => 'PageController@postContact']);

Route::get('newsletter', ['as' => 'newsletter', 'uses' => 'PageController@newsletter']);
Route::post('newsletter', ['as' => 'newsletter', 'uses' => 'PageController@postNewsletter']);

Route::get('cgu', ['as' => 'cgu', 'uses' => 'PageController@cgu']);

Route::get('agenda', ['as' => 'agenda.index', 'uses' => 'AgendaController@index']);
Route::get('events-all', ['as' => 'event-all', 'uses' => 'Admin\EventController@all']);

Route::get('media/video', ['as' => 'media.video', 'uses' => 'MediaController@getMediaVideo']);
Route::get('media/musique', ['as' => 'media.music', 'uses' => 'MediaController@getMediaMusic']);
Route::get('media/partitions', ['as' => 'media.partition', 'uses' => 'MediaController@getMediaPartition']);
