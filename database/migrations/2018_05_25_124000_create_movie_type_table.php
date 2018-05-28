<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('movie_type', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('movie_branch_id')->unsigned();
           $table->integer('type_id')->unsigned();

           $table->timestamps();
       });

       Schema::table('movie_type', function ($table) {

           $table->foreign('movie_branch_id' , 'movie_type_branch_id')->references('id')->on('movie_branch')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('type_id' , 'branch_type_movie_id')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
           Schema::dropIfExists('movie_type');
     }
}
