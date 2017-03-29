<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'ProfileController@index')->name('profile');
Route::get('profile/{id}', 'ProfileController@profile');
Route::post('update-profile','ProfileController@update');
Route::post('update-profile-image','ProfileController@updateImage');
Route::get('quotes','HomeController@getQuotes');
Route::post('mypost','HomeController@mypost');

