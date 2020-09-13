<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KaryaTulis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karya_tulis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('penulis')->nullable();
            $table->string('penulis_kedua')->nullable();
            $table->string('judul_buku')->nullable();
            $table->string('nama_penerbit')->nullable();
            $table->string('tahun')->nullable();
            $table->string('kota_negara')->nullable();
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
        Schema::drop('karya_tulis');
    }
}
