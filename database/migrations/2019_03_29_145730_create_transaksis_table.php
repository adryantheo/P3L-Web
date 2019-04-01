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
            $table->double('Diskon');
            $table->string('Tanggal');
            $table->string('Status');
            $table->unsignedInteger('Cabang_Id');
            $table->unsignedInteger('Kustomer_Id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
