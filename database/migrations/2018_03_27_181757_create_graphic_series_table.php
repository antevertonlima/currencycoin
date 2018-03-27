<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphicSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphic_series', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('graphic_type_id')->unsigned();
            $table->foreign('graphic_type_id')->references('id')->on('graphic_types');
            $table->string('name')->unique();
            $table->string('description')->nulable();
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
        Schema::dropIfExists('graphic_series');
    }
}
