<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananBarangsTable extends Migration
{
   
    public function up()
    {
        Schema::create('pesanan__barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nama_Barang');
            $table->string('Status');
            $table->string('Tanggal_Pesan');
            $table->string('Tanggal_Terima');
            $table->unsignedInteger('Sales_Id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('pesanan__barangs');
    }
}