<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;
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

    public function transaksi_service(){
        return $this->hasMany(Pegawai::class);
    }
}
