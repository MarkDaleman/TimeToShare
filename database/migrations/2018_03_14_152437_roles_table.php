<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

//        Schema::create('users', function(Blueprint $table){
//            // pak de users tabel, koppel role_id op de role id in de roles db
//            $table->foreign('role_id')->references('roles')->on('id');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('users', function(Blueprint $table){
//            // pak de users tabel, koppel role_id op de role id in de roles db
//            $table->dropForeign(['role_id']);
//        });
        Schema::dropIfExists('roles');

    }
}
