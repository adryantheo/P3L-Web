<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->double('Total_Pembelian');
            $table->double('Total_Service');
            $table->double('Total_Seluruh');
            $table->double('Diskon');
            $table->unsignedInteger('pegawai_id');
            $table->string('Status');
            $table->unsignedInteger('cabang_id');
            $table->unsignedInteger('kustomer_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
