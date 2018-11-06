<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixDurationminToDuration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_services', function(Blueprint $table) {
            $table->unsignedInteger('duration');
            $table->dropColumn('duration_min');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_services', function(Blueprint $table) {
            $table->dropColumn('duration');
            $table->unsignedInteger('duration_min');
        });
    }
}
