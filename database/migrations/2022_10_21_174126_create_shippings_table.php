<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('frist_name');
            $table->string('last_name')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('country')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->text('address_holdding');
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
        Schema::dropIfExists('shippings');
    }
}
