<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'Nomor_Telphone_Sales',
        'Nama_Sales',
        'Nama_Supplier'
    ];

    public function pesanan_barang(){
        return $this->hasMany(Pesanan_Barang::class);
    }

}
