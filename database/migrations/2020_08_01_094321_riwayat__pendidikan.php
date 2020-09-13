<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RiwayatPendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('perguruan_tinggi')->nullable();
            $table->string('gelar_akademik')->nullable();
            $table->date('tanggal_izasah')->nullable();
            $table->string('jenjang')->nullable();
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
        Schema::drop('riwayat_pendidikan');
    }
}
