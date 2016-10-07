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

Route::get('/', 'WelcomeController@index');
Route::get('/admin', 'HomeController@index');
Route::get('/employer', 'HomeController@index');
Route::get('/jobseeker', 'HomeController@index');

//route umum
Route::get('home', 'HomeController@index');
Route::get('/getartikel/{id}', 'ArtikelController@getArtikel');

//route admin
Route::group(['prefix'=>'/admin','middleware' =>'admin'],function(){
	Route::resource('/payment', 'AdminController');
	Route::resource('/user', 'UserController');
	Route::resource('/artikel', 'ArtikelController');
	Route::resource('/seminar', 'SeminarController');
});

//route employer
Route::group(['prefix'=>'/employer','middleware' =>'employer'],function(){
	Route::resource('/dashboard', 'EmployerController');
});

//route jobseeker
Route::group(['prefix'=>'/jobseeker','middleware' =>'jobseeker'],function(){
	
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
