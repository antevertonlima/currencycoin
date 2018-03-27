<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashrateGraphicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashrate_graphics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('graphics_card_id')->unsigned();
            $table->foreign('graphics_card_id')->references('id')->on('graphics_cards');
            $table->integer('coin_id')->unsigned();
            $table->foreign('coin_id')->references('id')->on('coins');
            $table->string('state')->default('stock');
            $table->string('hashrate');
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
        Schema::dropIfExists('hashrate_graphics');
    }
}
