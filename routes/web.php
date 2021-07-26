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