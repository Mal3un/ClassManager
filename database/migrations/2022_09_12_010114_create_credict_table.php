<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RegisterCredits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('major_id')->constrained('majors');


            $table->string('class_ids');
            $table->string('subject_ids');


            $table->string('time');
            $table->string('status');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();


        });

        if (!Schema::hasColumn('classes', 'quality')) {
            Schema::table('classes', function (Blueprint $table) {
                $table->smallInteger('quality_student')->default(20);
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
        Schema::dropIfExists('credict');
    }
}
