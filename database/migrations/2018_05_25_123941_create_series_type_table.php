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
           $table->integer('series_branch_id')->unsigned();
           $table->integer('type_id')->unsigned();

           $table->timestamps();
       });

       Schema::table('series_type', function ($table) {

           $table->foreign('series_branch_id' , 'series_branch_type_id')->references('id')->on('series_branch')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('type_id' , 'type_branch_series_id')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
       });
     }

     /**
      * Reverse the migrations.
      * @return void
      */
     public function down()
     {
           Schema::dropIfExists('series_type');
     }
}
