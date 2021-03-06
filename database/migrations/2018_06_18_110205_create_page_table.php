<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('pages', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('active')->unsigned();
         $table->string('slug')->nullable();
         $table->string('heading')->nullable();
         $table->text('body');

         $table->timestamps();
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('pages');
     }
}
