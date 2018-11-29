<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group');
            $table->string('item');
            $table->string('url');
            $table->timestamps();
        });

        DB::table('icons')->insert([
            ['group' => 'fruits', 'item' => 'apples', 'url' => 'apple.png'],
            ['group' => 'fruits', 'item' => 'bananas', 'url' => 'banana.png'],
            ['group' => 'fruits', 'item' => 'watermelons', 'url' => 'watermelon.png'],
            ['group' => 'fruits', 'item' => 'pumpkins', 'url' => 'pumpkin.png'],
            ['group' => 'vegetables', 'item' => 'beans', 'url' => ''],
            ['group' => 'vegetables', 'item' => 'tomatoes', 'url' => ''],
            ['group' => 'vegetables', 'item' => 'potatoes', 'url' => 'potatoes.png'],
            ['group' => 'vegetables', 'item' => 'carrots', 'url' => 'carrot.png'],
            ['group' => 'vegetables', 'item' => 'cabbages', 'url' => ''],
            ['group' => 'animal products', 'item' => 'milk', 'url' => 'milk.png'],
            ['group' => 'animal products', 'item' => 'eggs', 'url' => 'egg.png'],
            ['group' => 'animal products', 'item' => 'cheese', 'url' => 'cheese.png'],
            ['group' => 'animal products', 'item' => 'meat', 'url' => 'steak.png'],
            ['group' => 'misc', 'item' => 'bread', 'url' => 'bread.png'],
            ['group' => 'misc', 'item' => 'misc', 'url' => 'question.png'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icons');
    }
}
