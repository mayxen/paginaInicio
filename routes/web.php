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
Route::get('/admin/crearTrabajo', 'adminController@viewCreateTrabajo')->name('createTrabajo view');
Route::get('/admin/listadoTrabajos', 'adminController@listadoTrabajos')->name('listadoTrabajos view');
Route::get('/admin/{idTrabajo}', 'adminController@crearRecursos')->name('crearRecursos view');

Route::post('/admin/getDatosTrabajo', 'adminController@getDatosTrabajo')->name('getDatosTrabajo');
Route::post('/admin/exp', 'adminController@uploadExp')->name('Upload Exp');
Route::post('/admin/otro', 'adminController@uploadDet')->name('Upload Otro');
Route::post('/admin/apt', 'adminController@uploadApt')->name('Upload Apt');
Route::post('/admin/for', 'adminController@uploadFor')->name('Upload For');
Route::post('/admin/crearTrabajo/add', 'adminController@createTrabajo')->name('createTrabajo add');
Route::post('/admin/{idTrabajo}', 'adminController@crearRecursos')->name('crearRecursos view');

Route::put('/admin/updateDatosTrabajo', 'adminController@updateDatosTrabajo')->name('updateDatosTrabajo');

Route::delete('/admin/delete/exp', 'adminController@deleteExp')->name('Delete Exp');
Route::delete('/admin/delete/otro', 'adminController@deleteDet')->name('Delete Otro');
Route::delete('/admin/delete/apt', 'adminController@deleteApt')->name('Delete Apt');
Route::delete('/admin/delete/for', 'adminController@deleteFor')->name('Delete For');
Route::delete('/admin/deleteTrabajo', 'adminController@deleteTrabajo')->name('deleteTrabajo');