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
            $table->bigInteger('inserted_by')->nullable();
            $table->date('edited_at')->nullable();
            $table->bigInteger('edited_by')->nullable();
        });

        Schema::table('ref_profesi', function($table) {
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
        Schema::dropIfExists('ref_profesi');
    }
}
