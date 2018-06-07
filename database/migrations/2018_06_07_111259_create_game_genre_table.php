<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('game_genre', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('genre_id')->unsigned();
           $table->integer('game_id')->unsigned();
           $table->timestamps();
       });

       Schema::table('game_genre', function ($table) {

           $table->foreign('game_id' , 'game_genre_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('genre_id' , 'genre_game_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('game_genre');
     }
}
