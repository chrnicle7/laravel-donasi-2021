<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekening extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_vendor');
            $table->string('nama_rekening');
            $table->string('nomor_rekening');
            $table->boolean('is_active');
            $table->date('inserted_at');
            $table->bigInteger('inserted_by')->nullable();
            $table->date('edited_at')->nullable();
            $table->bigInteger('edited_by')->nullable();
        });

        Schema::table('rekening', function($table) {
            $table->foreign('id_vendor')->references('id')->on('ref_vendor_saving')->onDelete('cascade');
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
        Schema::dropIfExists('rekening');
    }
}
