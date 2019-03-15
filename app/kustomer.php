<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kustomer extends Model
{
    protected $fillable = [
        'Nama_Kustomer',
        'Alamat_Kustomer',
        'Telepon_Kustomer'
    ];

    public function kendaraans()
        {
            return $this->hasMany(Kendaraan::class);
        }

}
