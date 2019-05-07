<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi_Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'Total_Biaya', 
        'pegawai_id',
        'Jumlah_Service',
        'Status',
        'transaksi_id',
        'service_id',
        'kendaraan_id'
        
 ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function pegawai(){
        return $this->belongsTo(User::class, 'pegawai_id');
    }

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
    
}
