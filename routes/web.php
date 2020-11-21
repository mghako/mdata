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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{any}', 'SpaController@index')->where('any', '.*');
// profile routes
Route::get('profile', 'ProfileController@index')->name('profile.index');

// TOken Controller
// create token
// Route::post('tokens', 'TokenController@store')->name('tokens.store');

Route::resource('cities', 'CityController');
Route::resource('townships', 'TownshipController');
Route::resource('tokens', 'TokenController');