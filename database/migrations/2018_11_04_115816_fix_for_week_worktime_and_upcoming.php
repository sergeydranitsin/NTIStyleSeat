<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixForWeekWorktimeAndUpcoming extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weekly_worktime', function(Blueprint $table) {
            $table->increments('id');
        });
        Schema::table('upcoming_hours', function(Blueprint $table) {
            $table->increments('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weekly_worktime', function(Blueprint $table) {
            $table->dropColumn('id');
        });
        Schema::table('upcoming_hours', function(Blueprint $table) {
            $table->dropColumn('id');
        });
    }
}
