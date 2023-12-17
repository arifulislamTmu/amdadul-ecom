<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_code');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->integer('brand_name');
            $table->integer('category_name');
            $table->string('product_size');
            $table->string('product_color');
            $table->text('sort_description');
            $table->text('long_description');
            $table->string('product_img_one')->nullable();
            $table->string('product_img_two')->nullable();
            $table->string('product_img_three')->nullable();
            $table->string('product_img_four')->nullable();
            $table->string('product_img_five')->nullable();
            $table->string('product_img_six')->nullable();
            $table->string('product_status')->default('1');
            $table->string('product_slug');
            $table->timestamps();
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
