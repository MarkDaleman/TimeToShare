<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); // Product ID
            $table->char('owner_id'); // Wie is de eigenaar van het product
            $table->string('product_name'); // Neem van het product
            $table->char('share_holder_id'); // Wie heeft het product nu ?
            $table->tinyInteger('share_status');
            $table->boolean('product_returned'); // is het product teruggegeven?
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('share_holder_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
