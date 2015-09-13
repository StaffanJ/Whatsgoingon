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


// HOME PAGE ===================================  
// we dont need to use Laravel Blade 
// we will return a PHP file that will hold all of our Angular content
// see the "Where to Place Angular Files" below to see ideas on how to structure your app return  
Route::get('/', function() {   
    return view('index'); // will return app/views/index.php 
});

// API ROUTES ==================================  
Route::group(array('prefix' => 'api'), function() {
	
	Route::get('/', 'EventController@index');
	Route::post('mailtip', 'EventController@mailTip');
	
	Route::resource('events', 'EventController');

	Route::get('{city}', 'EventController@city');
	Route::get('{city}/tags/{tags}', 'TagsController@show');

	// Authentication routes
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');

	// Registration routes
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

	//Resource routes for events
	Route::get('{city}/{id}', 'EventController@show');
	Route::get('events/{events}/report', 'EventController@report');
	Route::post('events/{events}/reportPost', 'EventController@postReport');
});