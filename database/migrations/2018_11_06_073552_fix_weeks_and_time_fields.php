<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixWeeksAndTimeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weekly_worktime', function (Blueprint $table) {
            $table->unsignedInteger('weekday')->change();
            $table->unsignedInteger('start_time')->change();
            $table->unsignedInteger('end_time')->change();
            $table->unsignedInteger('start_break_time')->change();
            $table->unsignedInteger('end_break_time')->change();
        });
        Schema::table('upcoming_hours', function (Blueprint $table) {
            $table->unsignedInteger('start_time')->change();
            $table->unsignedInteger('end_time')->change();
            $table->unsignedInteger('start_break_time')->change();
            $table->dropColumn('end_dreak_time');
            $table->unsignedInteger('end_break_time');
        });
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedInteger('start_time')->change();
            $table->date('day');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weekly_worktime', function (Blueprint $table) {
            $table->string('weekday')->change();
            $table->time('start_time')->change();
            $table->time('end_time')->change();
            $table->time('start_break_time')->change();
            $table->time('end_break_time')->change();
        });
        Schema::table('upcoming_hours', function (Blueprint $table) {
            $table->time('start_time')->change();
            $table->time('end_time')->change();
            $table->time('start_break_time')->change();
            $table->time('end_break_time')->change();
        });
        Schema::table('appointments', function (Blueprint $table) {
            $table->time('start_time')->change();
            $table->dropColumn('day');
        });
    }
}
