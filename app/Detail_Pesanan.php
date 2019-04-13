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
        'pesanan_id',
        'sparepart_id'
 ];

    public function pesanan_barangs(){
     return $this->belongsTo(Pesanan_Barang::class, 'pesanan_id');
    }

    public function spareparts(){
        return $this->belongsTo(Sparepart::class, 'sparepart_id');
    }

}
