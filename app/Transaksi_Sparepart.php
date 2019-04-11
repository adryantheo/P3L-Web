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
        'Transaksi_Id',
        'Sparepart_id'
 ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'Transaksi_Id');
    }

    public function sparepart(){
        return $this->belongsTo(Sparepart::class, 'Sparepart_Id');
    }
}
