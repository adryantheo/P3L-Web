<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi_Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'Total_Biaya', 
        'Pegawai_Id',
        'Jumlah_Service',
        'Status',
        'Transaksi_Id'
 ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'Transaksi_Id');
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'Pegawai_Id');
    }
    
}
