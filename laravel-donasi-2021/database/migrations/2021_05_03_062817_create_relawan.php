<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relawan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->text('alamat_ktp');
            $table->string('no_wa');
            $table->bigInteger('id_prov');
            $table->bigInteger('id_kab');
            $table->bigInteger('id_kec');
            $table->bigInteger('id_kel');
            $table->bigInteger('id_profesi');
            $table->smallInteger('id_jk');
            $table->bigInteger('id_agama');
            $table->rememberToken();
            $table->string('email')->unique();
            $table->boolean('is_verified');
            $table->date('inserted_at');
            $table->bigInteger('inserted_by');
            $table->date('edited_at');
            $table->bigInteger('edited_by');
        });

        Schema::table('relawan', function($table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_prov')->references('id')->on('provinsi')->onDelete('cascade');
            $table->foreign('id_kab')->references('id')->on('kabupaten')->onDelete('cascade');
            $table->foreign('id_kec')->references('id')->on('kecamatan')->onDelete('cascade');
            $table->foreign('id_kel')->references('id')->on('kelurahan')->onDelete('cascade');
            $table->foreign('id_profesi')->references('id')->on('ref_profesi')->onDelete('cascade');
            $table->foreign('id_agama')->references('id')->on('ref_agama')->onDelete('cascade');
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
        Schema::dropIfExists('relawan');
    }
}
