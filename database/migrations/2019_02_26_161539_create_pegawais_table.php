<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->string('no_telp');
            $table->string('nama');
            $table->string('alamat');
            $table->double('gaji')->default(5000);
            $table->string('password');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
