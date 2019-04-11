<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi_Sparepart extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'Jumlah_Dibeli', 
        'Subtotal', 
        'Sisa_Stok',
        'transaksi_id',
        'sparepart_id'
 ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function sparepart(){
        return $this->belongsTo(Sparepart::class, 'sparepart_id');
    }
}
