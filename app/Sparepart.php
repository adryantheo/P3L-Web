<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $fillable = [
        'Kode_Sparepart',
        'Nama',
        'Tipe',
        'Merk',
        'Gambar',
        'Harga_Beli',
        'Harga_Jual',
        'Letak',
        'Stok',
        'Stok_Min'
    ];


}