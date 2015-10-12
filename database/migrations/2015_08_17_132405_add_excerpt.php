<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcerpt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function(Blueprint $table)
        {
            $table->integer('img_id')->nullable()->unsigned();
        });

        Schema::table('tags', function($table) {
           $table->foreign('img_id')->references('id')->on('event_image')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function(Blueprint $table)
        {
            $table->dropColumn('img_id');
        });
    }
}
