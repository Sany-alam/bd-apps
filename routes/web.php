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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/','ApkController@add_apk');
    Route::post('/add-apk','ApkController@create_apk');
    Route::get('/edit-apk/{id}','ApkController@edit_apk');
    Route::post('/update-apk','ApkController@update_apk');
    Route::get('/delete-apk/{id}','ApkController@delete_apk');
    Route::get('/view-apk','ApkController@view_apk');
    Route::view('/add-account','add-account');
    Route::post('/add-account','AccountController@add_account');
});

Route::group(['middleware' => 'guest'], function () {
    Route::view('login','login')->name('login');
    Route::post('login','AuthController@login');
    Route::get('logout','AuthController@logout');
});

