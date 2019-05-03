<?php

use Illuminate\Http\Request;

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/upload-gambar', 'SparepartController@uploadGambar');
Route::get('/pegawai', 'UserController@index');
Route::post('/pegawai/{user}', 'UserController@update');
Route::delete('/pegawai/{user}', 'UserController@destroy');
Route::get('/kustomer/all', 'KustomerController@all');
Route::get('/kendaraan/all', 'KendaraanController@all');
Route::get('/kendaraan/findKendaraan/{plat}', 'KendaraanController@findKendaraan');
Route::get('/kustomer/findKustomer/{notelp}', 'KustomerController@findKustomer');
Route::patch('/sales/{sales}', 'SalesController@update');
Route::get('/sales/all', 'SalesController@all');
Route::get('/pesanbarang/all', 'PesananBarangController@all');
Route::delete('/pesanbarang/{pesanan_Barang}', 'PesananBarangController@destroy');
Route::get('/detailpesanan/all', 'DetailPesananController@all');
Route::delete('/detailpesanan/{detail_Pesanan}', 'DetailPesananController@destroy');
Route::get('/sparepart/all', 'SparepartController@all');
Route::post('/sparepart/{sparepart}', 'SparepartController@update');
Route::post('/pegawai/gantipass', 'UserController@gantipassword');

Route::resource('/pesanbarang', 'PesananBarangController')->except(['all','destroy']);
Route::resource('/detailpesanan', 'DetailPesananController')->except(['all', 'destroy']);
Route::resource('/kustomer', 'KustomerController')->except(['search', 'all','listNamaKustomer']);
Route::resource('/kendaraan', 'KendaraanController')->except(['all']);
Route::resource('/transaksi', 'TransaksiController');
Route::resource('/service', 'ServiceController');
Route::resource('/sales', 'SalesController')->except(['update', 'all']);
Route::resource('/sparepart', 'SparepartController')->except(['uploadGambar','update']);



Route::group(['middleware' => 'auth:api'], function(){

   
    Route::resource('/pegawai', 'UserController')->except(['delete','update','index', 'login', 'register', 'gantipassword']);
    
});
