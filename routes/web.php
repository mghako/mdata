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

Auth::routes(['verify' => true]);

Route::middleware(['verified', 'auth'])->get('/home', 'HomeController@index')->name('home');
// Route::get('/{any}', 'SpaController@index')->where('any', '.*');


// profile routes
Route::middleware(['verified','auth'])->get('profile', 'ProfileController@index')->name('profile.index');

// TOken Controller
// create token
// Route::post('tokens', 'TokenController@store')->name('tokens.store');
Route::middleware(['verified', 'auth'])->group(function() {
    Route::resources([
        'cities' => 'CityController',
        'townships' => 'TownshipController',
        'tokens' => 'TokenController'
    ]);
});
