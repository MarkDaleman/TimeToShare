<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
//          $table->uuid('id', 36);
            $table->char('id', 36)->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->integer('active')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->primary('id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
