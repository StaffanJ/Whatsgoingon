<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CityImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_image', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });

        Schema::table('city', function($table) {
           $table->foreign('img_id')->references('id')->on('city_image')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_image');
    }
}
