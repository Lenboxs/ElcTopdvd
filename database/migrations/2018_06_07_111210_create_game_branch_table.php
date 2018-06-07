<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('game_branch', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('game_id')->unsigned();
           $table->integer('branch_id')->unsigned();

           $table->timestamps();
       });

       Schema::table('game_branch', function ($table) {

           $table->foreign('game_id' , 'game_branch_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('branch_id' , 'branch_game_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
           Schema::dropIfExists('game_branch');
     }
}
