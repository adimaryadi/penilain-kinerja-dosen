<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Penelitian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('penelitian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_penelitian')->nullable();
            $table->string('bidang_ilmu')->nullable();
            $table->string('lembaga')->nullable();
            $table->string('tahun')->nullable();
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
        Schema::drop('penelitian');
    }
}
