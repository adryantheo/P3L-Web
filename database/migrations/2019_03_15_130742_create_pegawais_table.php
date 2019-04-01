<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nama');
            $table->string('Email');
            $table->string('Alamat');
            $table->double('Gaji');
            $table->string('Role');
            $table->string('Password');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
