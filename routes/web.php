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
    return view('formRegister');
});

Route::get('/formregistrasi',"formRegisterController@index") -> name('getForm');
Route::post('/formregistrasi',"formRegisterController@search") -> name('getFormSearch');
Route::get('/formregistrasi/status',"formRegisterController@indexStatus") -> name('getFormStatus');
