<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkunjungsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkunjungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->integer('absen');
            $table->string('tgl_berkunjung');
            $table->string('keperluan');
            $table->string('kondisi');
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
        Schema::dropIfExists('berkunjungs');
    }
}
