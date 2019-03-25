<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Model
{
    protected $fillable = [
        'Nama',
        'Email',
        'Alamat',
        'Gaji',
        'Role',
        'Password',
    ];

    
    protected $hidden = [
        'Password'
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
