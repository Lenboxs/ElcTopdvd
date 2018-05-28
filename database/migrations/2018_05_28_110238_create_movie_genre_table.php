<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('movie_genre', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('genre_id')->unsigned();
          $table->integer('movie_id')->unsigned();
          $table->timestamps();
      });

      Schema::table('movie_genre', function ($table) {

          $table->foreign('movie_id' , 'movie_genre_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('genre_id' , 'genre_movie_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_genre');
    }
}
