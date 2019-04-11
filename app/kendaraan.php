<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kendaraan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'Plat_kendaraan', 
        'Merk', 
        'Tipe',
        'Kustomer_Id',
        

    ];

    public function user(){
        return $this->belongsTo(Kustomer::class, 'Kustomer_Id');
    }


   
}
