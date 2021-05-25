<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttrsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            Schema::table('user', function($table) {
                $table->string('header');
                $table->string('username');
                $table->string('blog');
                $table->string('password');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            Schema::table('user', function($table) {
                $table->dropColumn('header');
                $table->dropColumn('username');

                $table->dropColumn('blog');
                $table->dropColumn('password');
            });
        });
    }
}
