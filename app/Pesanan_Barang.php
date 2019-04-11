<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesanan_Barang extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'Nama_Barang',
        'Status', 
        'Tanggal_Pesan',
        'Tanggal_Terima',
        'Sales_Id'
 ];

 public function sales(){
    return $this->belongsTo(Sales::class, 'Sales_Id');
}

public function detail_pesanan(){
    return $this->hasMany(Detail_Pesanan::class);
}
}
