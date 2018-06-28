<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'home_page', function( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'heading' );
            $table->integer( 'slider_id' )->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table( 'home_page', function( $table ) {
            $table->foreign( 'slider_id' , 'slider_home_page_id' )->references( 'id' )->on( 'sliders' )->onDelete( 'cascade' )->onUpdate( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists( 'home_page' );
    }
}
