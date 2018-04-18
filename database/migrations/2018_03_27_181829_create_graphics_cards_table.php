<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphicsCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphics_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('consumption')->nulable();
            $table->string('description')->nulable();
            $table->integer('graphic_serie_id')->unsigned();
            $table->foreign('graphic_serie_id')->references('id')->on('graphic_series');
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
        Schema::dropIfExists('graphics_cards');
    }
}
