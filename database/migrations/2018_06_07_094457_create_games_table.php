<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('games', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('active')->unsigned();
         $table->integer('new')->unsigned();
         $table->integer('agerestrictions_id')->unsigned()->nullable();
         $table->string('name')->nullable();
         $table->string('slug')->nullable();
         $table->text('description');
         $table->string('image')->nullable();
         $table->string('trailerLink')->nullable();
         $table->integer('year')->nullable();

         $table->timestamps();
       });

       Schema::table('games', function ($table) {

           $table->foreign('active' , 'games_active_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('new' , 'games_new_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('age_id' , 'games_age_id')->references('id')->on('agerestrictions')->onDelete('cascade')->onUpdate('cascade');

       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('games');
     }
}
