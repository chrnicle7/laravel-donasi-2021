<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_role');
            $table->bigInteger('id_user');
            $table->timestamps();
        });

        Schema::table('role_user', function($table) {
            $table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');;
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
