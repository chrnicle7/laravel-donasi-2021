<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_berita', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_program');
            $table->string('judul');
            $table->text('konten_berita');
            $table->boolean('is_active');
            $table->date('inserted_at');
            $table->bigInteger('inserted_by')->nullable();
            $table->date('edited_at')->nullable();
            $table->bigInteger('edited_by')->nullable();
        });

        Schema::table('program_berita', function($table) {
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
            $table->foreign('inserted_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('edited_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_berita');
    }
}
