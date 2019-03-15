<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    protected $fillable = [
        'Plat_kendaraan', 
        'Merk', 
        'Tipe',
        'Id_Kustomer'

    ];

    public function user(){
        return $this->belongsTo(kustomer::class, 'Id_Kustomer');
    }

   
}
