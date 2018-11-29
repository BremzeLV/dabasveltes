<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->integer('price');
            $table->string('address');
            $table->string('price_type');
            $table->dateTime('ripe_time');
            $table->string('ripe_type');
            $table->string('lifecycle');
            $table->string('type');
            $table->text('description');
            $table->float('lat',10, 6);
            $table->float('lng',10, 6);
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
