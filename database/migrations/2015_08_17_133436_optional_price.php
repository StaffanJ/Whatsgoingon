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

        Schema::create('event_optional', function(Blueprint $table)
        {
            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->integer('optional_id')->unsigned()->index();
            $table->foreign('optional_id')->references('id')->on('optional_price')->onDelete('cascade');

            $table->integer('cost');

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
        Schema::drop('optional_price');
    }
}