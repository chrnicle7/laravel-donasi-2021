<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableToRelawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relawan', function (Blueprint $table) {
            $table->string('nama_belakang')->nullable()->change();
            $table->string('alamat_ktp')->nullable()->change();
            $table->string('no_wa')->nullable()->change();
            $table->bigInteger('id_profesi')->nullable()->change();
            $table->bigInteger('id_jk')->nullable()->change();
            $table->bigInteger('id_agama')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relawan', function (Blueprint $table) {
            //
        });
    }
}
