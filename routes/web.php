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
Route::group(['middleware' => ['auth']], function () {

});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contacto', 'HomeController@contacto')->name('contacto');
Route::resource('/trabajos','trabajosController');
Route::get('/admin', 'adminController@index')->name('Admin');
Route::get('/admin/cv', 'adminController@curriculum')->name('Cv');

Route::post('/admin/exp', 'adminController@uploadExp')->name('Upload Exp');
Route::post('/admin/otro', 'adminController@uploadDet')->name('Upload Otro');
Route::post('/admin/apt', 'adminController@uploadApt')->name('Upload Apt');
Route::post('/admin/for', 'adminController@uploadFor')->name('Upload For');

Route::delete('/admin/delete/exp', 'adminController@deleteExp')->name('Delete Exp');
Route::delete('/admin/delete/otro', 'adminController@deleteDet')->name('Delete Otro');
Route::delete('/admin/delete/apt', 'adminController@deleteApt')->name('Delete Apt');
Route::delete('/admin/delete/for', 'adminController@deleteFor')->name('Delete For');