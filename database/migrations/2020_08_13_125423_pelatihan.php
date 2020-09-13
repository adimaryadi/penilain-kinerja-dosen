<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pelatihan')->nullable();
            $table->string('lembaga')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('level')->nullable();
            $table->string('waktu')->nullable();
            $table->string('posisi')->nullable();
            $table->string('id_dosen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pelatihan');
    }
}
