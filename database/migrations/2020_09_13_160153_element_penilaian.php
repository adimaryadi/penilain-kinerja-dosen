<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ElementPenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_penilaian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('element')->nullable();
            $table->integer('sangat_baik')->nullable();
            $table->integer('baik')->nullable();
            $table->integer('cukup')->nullable();
            $table->integer('kurang_baik')->nullable();
            $table->bigInteger('id_dosen')->nullable();
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
        Schema::drop('element_penilaian');
    }
}
