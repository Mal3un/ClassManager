<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRemoveColumnTeacherIdInListPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('list_points', 'teacher_id')) {
            Schema::table('list_points', function (Blueprint $table) {
//                $table->dropForeign('list_points_teacher_id_foreign');
                $table->dropColumn('teacher_id');
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
        Schema::table('list_points', function (Blueprint $table) {
            //
        });
    }
}
