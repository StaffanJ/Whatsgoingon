<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class City extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city', function(Blueprint $table){
            $table->increments('id');
            $table->integer('img_id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('events', function($table) {
           $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('city');
    }
}
