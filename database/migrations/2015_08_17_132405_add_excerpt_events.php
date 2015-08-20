<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcerptEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function(Blueprint $table)
        {
            $table->integer('children_cost')->nullable();
            $table->integer('elderly_cost')->nullable();
            $table->integer('other_cost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function(Blueprint $table)
        {
            $table->dropColumn('children_cost');
            $table->dropColumn('elderly_cost');
            $table->dropColumn('other_cost');
        });
    }
}
