<?php

use Illuminate\Http\Request;


Route::post('/pegawai-create', 'PegawaiController@store');
Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/{pegawai}', 'PegawaiController@show');
Route::patch('/pegawai-edit/{pegawai}', 'PegawaiController@update');
Route::delete('/pegawai-hapus/{pegawai}', 'PegawaiController@destroy');

