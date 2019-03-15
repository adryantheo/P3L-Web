<?php

use Illuminate\Http\Request;




Route::resource('/kustomer', 'KustomerController');
Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/pegawai', 'PegawaiController');