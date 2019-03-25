<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJasaServicesTable extends Migration
{
    
    public function up()
    {
        Schema::create('jasa_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nama_Service');
            $table->double('Tarif');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('jasa_services');
    }
}
