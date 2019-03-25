<?php

use Illuminate\Http\Request;

Route::post('/login', 'PegawaiController@login');
Route::post('/upload-gambar', 'SparepartController@uploadGambar');


Route::resource('/kustomer', 'KustomerController');
Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/pegawai', 'PegawaiController')->except(['login']);;
Route::resource('/jasa-service', 'JasaServiceController');
Route::resource('/sparepart', 'SparepartController')->except(['uploadGambar']);;