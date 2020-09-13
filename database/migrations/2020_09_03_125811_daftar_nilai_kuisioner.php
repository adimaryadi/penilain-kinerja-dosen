<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DaftarNilaiKuisioner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_nilai_kuisioner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kuisioner');
            $table->string('mata_kuliah');
            $table->string('semester');
            $table->string('nilai');
            $table->string('id_dosen');
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
        Schema::drop('daftar_nilai_kuisioner');
    }
}
