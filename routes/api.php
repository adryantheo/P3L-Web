<?php

use Illuminate\Http\Request;

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/upload-gambar', 'SparepartController@uploadGambar');
Route::get('/pegawai', 'UserController@index');
Route::patch('/pegawai/{user}', 'UserController@update');
Route::delete('/pegawai/{user}', 'UserController@destroy');
Route::get('/kustomer/all', 'KustomerController@all');
Route::get('/kendaraan/all', 'KendaraanController@all');
Route::get('/kustomer/namakustomer', 'KustomerController@listNamaKustomer');
Route::patch('/sales/{sales}', 'SalesController@update');
Route::get('/sales/all', 'SalesController@all');
Route::get('/pesanbarang/all', 'PesananBarangController@all');
Route::get('/detailpesanan/all', 'DetailPesananController@all');
Route::delete('/detailpesanan/{detail_Pesanan}', 'DetailPesananController@destroy');
Route::get('/sparepart/all', 'SparepartController@all');
Route::patch('/sparepart/{sparepart}', 'SparepartController@update');

Route::resource('/pesanbarang', 'PesananBarangController')->except(['all']);
Route::resource('/detailpesanan', 'DetailPesananController')->except(['all', 'destroy']);
Route::resource('/kustomer', 'KustomerController')->except(['search', 'all','listNamaKustomer']);
Route::resource('/kendaraan', 'KendaraanController')->except(['all']);
Route::resource('/transaksi', 'TransaksiController');
Route::resource('/service', 'ServiceController');
Route::resource('/sales', 'SalesController')->except(['update', 'all']);
Route::resource('/sparepart', 'SparepartController')->except(['uploadGambar','update']);



Route::group(['middleware' => 'auth:api'], function(){
    Route::patch('/pegawai/gantipassword/{user}', 'UserController@gantiPassword');
   
    Route::resource('/pegawai', 'UserController')->except(['delete','update','index', 'login', 'register', 'gantiPassword']);
    
});
