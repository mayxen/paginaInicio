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
    return view('Users/welcome');
});

Route::get('/trabajos', function () {
    return view('Users/welcome');
});

Route::get('/trabajo', function () {
    return view('Users/welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');