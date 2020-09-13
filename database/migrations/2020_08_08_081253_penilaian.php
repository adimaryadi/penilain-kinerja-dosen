<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Penilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('element_penilaian')->nullable();
            $table->bigInteger('sangat_baik')->nullable();
            $table->bigInteger('baik')->nullable();
            $table->bigInteger('cukup')->nullable();
            $table->bigInteger('kurang')->nullable();
            $table->bigInteger('sangat_kurang')->nullable();
            $table->text('rekam_penilai')->nullable();
            $table->bigInteger('id_dosen')->nullable();
            $table->string('matkul')->nullable();
            $table->enum('jurusan',['informatika','sipil','elektro','arsitektur'])->nullable();
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
        Schema::drop('penilaian');
    }
}
