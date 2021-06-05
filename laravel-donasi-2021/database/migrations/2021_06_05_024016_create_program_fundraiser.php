<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramFundraiser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_fundraiser', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_program');
            $table->bigInteger('id_user');
            $table->date('inserted_at');
            $table->bigInteger('inserted_by');
            $table->date('edited_at');
            $table->bigInteger('edited_by');
            $table->timestamps();
        });

        Schema::table('program_fundraiser', function($table) {
            $table->foreign('id_program')->references('id')->on('program')->onDelete('set null');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('program_fundraiser');
    }
}
