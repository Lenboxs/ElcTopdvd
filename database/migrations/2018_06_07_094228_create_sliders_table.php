<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sliders', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('active')->unsigned();
          $table->string('name')->nullable();
          $table->integer('home_page_id')->unsigned()->nullable();


          $table->timestamps();
      });

      Schema::table('sliders', function ($table) {
          $table->foreign('home_page_id' , 'home_page_slides_id')->references('id')->on('home_page')->onDelete('cascade')->onUpdate('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
