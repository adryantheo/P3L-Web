<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_Pesanan extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'Total_Harga_Beli', 
        'Jumlah_Diterima',
        'Jumlah_Pesan',
        'Pesanan_Id'
 ];

    public function pesanan_barang(){
     return $this->belongsTo(Pesanan_Barang::class, 'Pesanan_Id');
    }

    public function sparepart(){
        return $this->hasOne(Sparepart::class);
    }

}
