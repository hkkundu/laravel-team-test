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
Route::get('/wp', function () {
    return view('welcome_wordpress');
});
Route::get('/ws', function () {
    return view('welcomerealtime');
});
Route::get('/show', 'HomeController@multidimentionalarray');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


