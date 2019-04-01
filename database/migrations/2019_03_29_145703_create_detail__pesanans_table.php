<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPesanansTable extends Migration
{
   
    public function up()
    {
        Schema::create('detail__pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->double('Total_Harga_Beli');
            $table->Integer('Jumlah_Diterima');
            $table->Integer('Jumlah_Pesan');
            $table->unsignedInteger('Pesanan_Id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('detail__pesanans');
    }
}
