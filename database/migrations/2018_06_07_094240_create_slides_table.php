<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('slides', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('image')->nullable();
          $table->integer('slider_id')->unsigned();

          $table->timestamps();
      });
      Schema::table('slides', function ($table) {

          $table->foreign('slider_id' , 'slide_sliders_id')->references('id')->on('sliders')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
