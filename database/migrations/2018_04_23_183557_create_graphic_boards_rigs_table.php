<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphicBoardsRigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphic_boards_rigs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount')->default(1);
            $table->integer('rig_id')->unsigned();
            $table->foreign('rig_id')->references('id')->on('rigs');
            $table->integer('graphics_card_id')->unsigned();
            $table->foreign('graphics_card_id')->references('id')->on('graphics_cards');
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
        Schema::dropIfExists('graphic_boards_rigs');
    }
}
