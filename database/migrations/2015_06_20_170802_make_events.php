<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('city_id')->unsigned();
            $table->integer('img_id')->unsigned();
            $table->integer('optional_id')->unsigned();
            $table->string('title');
            $table->string('body');
            $table->integer('age');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('cost');
            $table->string('event_page');
            $table->timestamp('date');
            $table->string('address');
            $table->integer('visitors');
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
        Schema::drop('events');
    }
}
