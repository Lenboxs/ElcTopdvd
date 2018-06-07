<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('specials', function (Blueprint $table) {
           $table->increments('id');
           $table->string('link')->nullable();
           $table->string('image')->nullable();
           $table->integer('type_special_id')->unsigned()->nullable();

           $table->timestamps();
       });
       Schema::table('specials', function ($table) {

           $table->foreign('type_special_id' , 'specials_types_id')->references('id')->on('special_types')->onDelete('cascade')->onUpdate('cascade');

       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('specials');
     }
}
