<?php

use Illuminate\Http\Request;

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/upload-gambar', 'SparepartController@uploadGambar');
Route::get('/pegawai', 'UserController@index');
Route::patch('/pegawai/{user}', 'UserController@update');
Route::get('/kustomer/all', 'kustomerController@all');


// Route::get('/logout', 'UserController@logout');
//Route::get('/no-telp/{Telepon_Kustomer}', 'KustomerController@findNoTelpon');

Route::resource('/kustomer', 'KustomerController')->except(['findNoTelpon', 'all']);
Route::resource('/kendaraan', 'KendaraanController');

Route::resource('/service', 'ServiceController');
Route::resource('/sparepart', 'SparepartController')->except(['uploadGambar']);



Route::group(['middleware' => 'auth:api'], function(){
    Route::patch('/pegawai/gantipassword/{user}', 'UserController@gantiPassword');
   
    Route::resource('/pegawai', 'UserController')->except(['update','index', 'login', 'register', 'gantiPassword']);
    
});
