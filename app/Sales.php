<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'Nomor_Telphone_Sales',
        'Nama_Salas',
        'Nama_Supplier'
    ];

}
