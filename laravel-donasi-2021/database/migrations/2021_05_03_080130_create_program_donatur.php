<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramDonatur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_donatur', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_program');
            $table->integer('nominal_donasi');
            $table->bigInteger('id_rekening');
            $table->string('nama_pengirim');
            $table->string('no_rekening_pengirim');
            $table->string('atas_nama');
            $table->string('email');
            $table->text('pesan');
            $table->string('status_verifikasi');
            $table->string('status_donasi');
            $table->date('inserted_at');
            $table->bigInteger('inserted_by');
            $table->date('edited_at');
            $table->bigInteger('edited_by');
            $table->date('verified_at')->nullable();
            $table->bigInteger('verified_by')->nullable();
        });

        Schema::table('program_donatur', function($table) {
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
            $table->foreign('id_rekening')->references('id')->on('rekening')->onDelete('cascade');
            $table->foreign('inserted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('edited_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('verified_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_donatur');
    }
}
