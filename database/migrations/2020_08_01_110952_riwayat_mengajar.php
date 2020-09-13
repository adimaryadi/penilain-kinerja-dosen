<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RiwayatMengajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_mengajar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semester')->nullable();
            $table->string('kode_mata_kuliah')->nullable();
            $table->string('nama_mata_kuliah')->nullable();
            $table->string('kode_kelas')->nullable();
            $table->string('perguruan_tinggi')->nullable();
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
        //
        Schema::drop('riwayat_mengajar');
    }
}
