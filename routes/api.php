<?php

use Illuminate\Http\Request;

Route::post('/login', 'PegawaiController@login');
Route::post('/register', 'PegawaiController@register');
Route::post('/upload-gambar', 'SparepartController@uploadGambar');


Route::resource('/kustomer', 'KustomerController');
Route::resource('/kendaraan', 'KendaraanController');

Route::resource('/service', 'ServiceController');
Route::resource('/sparepart', 'SparepartController')->except(['uploadGambar']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::patch('/pegawai/{pegawai}/gantipassword', 'PegawaiController@gantiPassword');
    Route::resource('/pegawai', 'PegawaiController')->except(['login', 'register', 'gantiPassword']);
    
});