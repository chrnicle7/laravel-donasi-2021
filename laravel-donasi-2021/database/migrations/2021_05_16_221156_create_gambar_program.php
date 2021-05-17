<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_program', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_program');
            $table->string('nama');
            $table->string('ekstensi');
            $table->integer('ukuran');
            $table->string('path');
            $table->timestamps();
        });

        Schema::table('gambar_program', function($table) {
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar_program');
    }
}
