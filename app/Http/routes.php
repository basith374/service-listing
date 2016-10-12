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

Route::get('/admin', 'Auth\AuthController@getLogin');
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@logout');
Route::controller('admin', 'AdminController');

Route::get('/', 'HomeController@index');
Route::get('/add-listing', 'HomeController@addListing');
Route::post('/add-listing', 'HomeController@saveListing');
Route::post('/post-review', 'HomeController@postReview');
Route::get('/state/{state}/districts', 'HomeController@districts');
Route::get('/{locality}/{category}/{business}', 'HomeController@business');