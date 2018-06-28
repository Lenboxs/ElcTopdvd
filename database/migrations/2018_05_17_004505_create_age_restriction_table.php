<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgerestrictionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('agerestrictions', function( Blueprint $table ) {
             $table->increments('id');
             $table->integer('active')->unsigned();
             $table->string('name')->nullable();

             $table->timestamps();
         });

         Schema::table( 'agerestrictions', function( $table ) {
             $table->foreign( 'active' , 'agerestrictions_active_id' )->references( 'id' )->on( 'statuses' )->onDelete( 'cascade' )->onUpdate( 'cascade' );
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('agerestrictions');
     }
}
