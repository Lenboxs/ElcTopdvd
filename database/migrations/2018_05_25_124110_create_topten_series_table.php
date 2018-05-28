<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToptenSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('topten_series', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('topten_id')->unsigned();
          $table->integer('series_id')->unsigned();
          $table->integer('sort');
          $table->timestamps();
      });

      Schema::table('topten_series', function ($table) {

          $table->foreign('series_id' , 'series_topten_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('topten_id' , 'topten_series_id')->references('id')->on('top_ten_page')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topten_series');
    }
}
