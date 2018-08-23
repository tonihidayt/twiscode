<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('products_id');
            $table->string('name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('weight');
            $table->integer('price');
            $table->string('details');
            $table->boolean('status');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
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
