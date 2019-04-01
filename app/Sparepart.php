<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sparepart extends Model
{
    use SoftDeletes;
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


    public function transaksi_sparepart(){
        return $this->hasMany(Transaksi_Sparepart::class);
    }


}
