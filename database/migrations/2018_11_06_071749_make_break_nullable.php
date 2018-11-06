<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeBreakNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weekly_worktime', function (Blueprint $table){
            $table->time('start_break_time')->nullable(true)->change();
            $table->time('end_break_time')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weekly_worktime', function (Blueprint $table){
            $table->time('start_break_time')->nullable(false)->change();
            $table->time('end_break_time')->nullable(false)->change();
        });
    }
}
