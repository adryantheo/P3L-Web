<?php

use Illuminate\Http\Request;

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/upload-gambar', 'SparepartController@uploadGambar');
Route::get('/pegawai', 'UserController@index');
// Route::get('/logout', 'UserController@logout');
//Route::get('/no-telp/{Telepon_Kustomer}', 'KustomerController@findNoTelpon');

Route::resource('/kustomer', 'KustomerController')->except(['findNoTelpon']);
Route::resource('/kendaraan', 'KendaraanController');

Route::resource('/service', 'ServiceController');
Route::resource('/sparepart', 'SparepartController')->except(['uploadGambar']);



Route::group(['middleware' => 'auth:api'], function(){
    Route::patch('/pegawai/{pegawai}/gantipassword', 'UserController@gantiPassword');
   
    Route::resource('/pegawai', 'UserController')->except(['index', 'login', 'register', 'gantiPassword']);
    
});
