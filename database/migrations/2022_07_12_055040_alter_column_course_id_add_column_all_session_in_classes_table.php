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
        if (!Schema::hasColumn('classes', 'all_session')) {
            Schema::table('classes', function (Blueprint $table) {
                $table->SmallInteger('all_session');
            });
        }
        if (!Schema::hasColumn('list_points', 'lesson')) {
            Schema::table('list_points', function (Blueprint $table) {
                $table->SmallInteger('lesson');
            });
        }
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
