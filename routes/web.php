<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/upload', 'UploadController@index');
Route::post('/import', 'UploadController@import');
Route::get('/submit_qr', 'UploadController@submit_qr');
Route::get('/download/{nik}', 'UploadController@download');

Route::get('/registrasi',"formRegisterController@index") -> name('getForm');
Route::post('/registrasi',"formRegisterController@search") -> name('getFormSearch');
Route::get('/registrasi/count',"formRegisterController@counterP") -> name('getFormCounter');
Route::get('/registrasi/status',"formRegisterController@indexStatus") -> name('getFormStatus');
Route::get('/registrasi/status/0',"formRegisterController@excel0") -> name('getFormStatus0');
Route::get('/registrasi/status/1',"formRegisterController@excel1") -> name('getFormStatus1');
Route::get('/registrasi/status/2',"formRegisterController@excel2") -> name('getFormStatus2');
Route::get('/registrasi/status/3',"formRegisterController@excel3") -> name('getFormStatus3');
Route::get('/registrasi/status/4',"formRegisterController@excel4") -> name('getFormStatus4');
Route::get('/registrasi/status/5',"formRegisterController@excel5") -> name('getFormStatus5');

Route::get('/check', 'UploadController@check');
Route::get('/list', 'UploadController@list');
Route::get('/edit/{id}', 'UploadController@edit');
Route::get('/delete_peserta/{id}', 'UploadController@delete_peserta');
Route::post('/update_peserta/{id}', 'UploadController@update_peserta');
