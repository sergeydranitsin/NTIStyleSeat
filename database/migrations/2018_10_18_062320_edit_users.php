<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('second_name');
            $table->string('mobile_phone')->nullable();
            $table->boolean('is_business');
            $table->string('social_id')->nullable();
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('second_name');
            $table->dropColumn('mobile_phone');
            $table->dropColumn('is_business');
            $table->dropColumn('social_id');
            $table->string('name');
        });
    }
}
