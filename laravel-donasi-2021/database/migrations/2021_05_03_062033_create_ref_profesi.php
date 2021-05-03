<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefProfesi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_profesi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->boolean('is_active');
            $table->date('inserted_at');
            $table->bigInteger('inserted_by');
            $table->date('edited_at');
            $table->bigInteger('edited_by');
        });

        Schema::table('ref_profesi', function($table) {
            $table->foreign('inserted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('edited_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_profesi');
    }
}
