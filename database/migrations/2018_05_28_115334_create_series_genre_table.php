<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_genre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('genre_id')->unsigned();
            $table->integer('series_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('series_genre', function ($table) {

            $table->foreign('series_id' , 'series_genre_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('genre_id' , 'genre_series_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series_genre');
    }
}
