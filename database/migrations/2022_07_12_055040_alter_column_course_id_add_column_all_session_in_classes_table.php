<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnCourseIdAddColumnAllSessionInClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
//        Schema::table('classes', function (Blueprint $table) {
//            $table->SmallInteger('all_session');
//        });
//        Schema::table('list_points', function (Blueprint $table) {
//            $table->SmallInteger('lesson');
//        });
=======
        Schema::table('classes', function (Blueprint $table) {
            $table->SmallInteger('all_session');
        });
        Schema::table('list_points', function (Blueprint $table) {
            $table->SmallInteger('lesson');
        });
>>>>>>> 87c9dcc6b935912706466e4df36e944843cab1d1
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            //
        });
    }
}
