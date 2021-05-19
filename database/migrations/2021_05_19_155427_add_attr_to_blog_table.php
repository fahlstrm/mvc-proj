<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttrToBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog', function (Blueprint $table) {
            Schema::table('blog', function($table) {
                $table->string('blog');
                $table->string('title');
                $table->string('post');
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
        Schema::table('blog', function (Blueprint $table) {
            Schema::table('blog', function($table) {
                $table->dropColumn('blog');
                $table->dropColumn('title');
                $table->dropColumn('post');
            });
        });
    }
}
