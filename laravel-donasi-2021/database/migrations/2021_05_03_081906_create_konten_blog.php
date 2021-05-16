<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontenBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konten_blog', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->string('judul');
            $table->text('konten');
            $table->date('inserted_at');
            $table->bigInteger('inserted_by')->nullable();
            $table->date('edited_at');
            $table->bigInteger('edited_by')->nullable();
            $table->date('verified_at')->nullable();
            $table->bigInteger('verified_by')->nullable();
        });

        Schema::table('konten_blog', function($table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('inserted_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('edited_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('verified_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konten_blog');
    }
}
