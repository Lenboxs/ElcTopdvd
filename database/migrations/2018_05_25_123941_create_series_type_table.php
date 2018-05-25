<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('series_type', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('movie_id')->unsigned();
           $table->integer('series_id')->unsigned();

           $table->timestamps();
       });

       Schema::table('series_type', function ($table) {

           $table->foreign('movie_id' , 'movie_series_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('series_id' , 'series_movie_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
           Schema::dropIfExists('series_type');
     }
}
