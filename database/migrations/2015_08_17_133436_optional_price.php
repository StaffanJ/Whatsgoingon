<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OptionalPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optional_price', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description');
        });

        Schema::table('events', function($table) {
           $table->foreign('optional_id')->references('id')->on('optional_price')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('optional_price');
    }
}
