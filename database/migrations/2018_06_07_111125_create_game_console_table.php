<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameConsoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('game_console', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('game_branch_id')->unsigned();
           $table->integer('console_id')->unsigned();

           $table->timestamps();
       });

       Schema::table('game_console', function ($table) {

           $table->foreign('game_branch_id' , 'game_console_branch_id')->references('id')->on('movie_branch')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('console_id' , 'branch_console_game_id')->references('id')->on('consoles')->onDelete('cascade')->onUpdate('cascade');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
           Schema::dropIfExists('game_console');
     }
}
