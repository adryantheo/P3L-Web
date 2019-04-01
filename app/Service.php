<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'Nama_Service', 
        'Tarif', 
        'Transaksi_Service_Id'
 ];

 public function transaksi_service
 {
     return $this->belongsTo(Transaksi_Service::class, 'Transaksi_Service_Id');
 }
}
