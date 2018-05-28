<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('review', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('user_id')->unsigned();
           $table->string('name')->nullable();
           $table->integer('reviewable_id');
           $table->string('reviewable_type');

           $table->timestamps();
       });

       Schema::table('review', function ($table) {

           //$table->foreign('movie_id' , 'movie_user_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('user_id' , 'user_review_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('review');
     }
}
