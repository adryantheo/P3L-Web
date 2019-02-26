<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    protected $primaryKey = 'no_telp';

    public $timestamps = true; 

    protected $fillable = [
        'no_telp',
         'nama',
         'alamat',
          'gaji',
          'password'
    ];  

    protected $hidden = [
        'password'
    ];
}
