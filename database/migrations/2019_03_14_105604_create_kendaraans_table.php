<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraansTable extends Migration
{
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('Plat_kendaraan');
            $table->string('Merk');
            $table->string('Tipe');
            $table->unsignedInteger('Kustomer_Id');
           
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
