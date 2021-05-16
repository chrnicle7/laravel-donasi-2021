<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramKomplain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_komplain', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_program');
            $table->text('complain');
            $table->text('response');
            $table->date('inserted_at');
            $table->bigInteger('inserted_by')->nullable();
            $table->date('edited_at');
            $table->bigInteger('edited_by')->nullable();
            $table->date('verified_at')->nullable();
            $table->bigInteger('verified_by')->nullable();
        });

        Schema::table('program_komplain', function($table) {
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
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
        Schema::dropIfExists('program_komplain');
    }
}
