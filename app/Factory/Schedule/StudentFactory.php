<?php

namespace App\Factory\Schedule;

use App\Models\Classe;
use App\Models\Course;
use App\Models\Major;
use App\Models\Score;
use App\Models\Student;
use mysql_xdevapi\Exception;

class StudentFactory extends ScheduleFactory
{
    public function getSchedule()
    {
            $student = Student::find($this->user)->only('first_name', 'last_name','birthdate','gender','major_id','course_id');
            $student['birthdate'] = date('d/m/Y', strtotime($student['birthdate']));
            $student['major'] = Major::find($student['major_id'])->name;
            $student['course'] = Course::find($student['course_id'])->name;
            $studentinfo = $student;
            $student = Score::where('student_id', $this->user)->pluck('classe_id');
            $arr = [];
            foreach ($student as $each){
                $classe = Classe::find($each);
                $classename = $classe->name;
                $classe->schedule = str_replace(' ', '', $classe->schedule);
                if($classe->schedule !== '' && $classe->schedule !== null){
                    $classe->schedule = explode('-', $classe->schedule);
                    foreach ($classe->schedule as $each2){
                        $day = substr($each2, 0, 1);
                        $time = explode(',',substr($each2, 1));
                        for($i = $time[0]; $i <= $time[1]; $i++){
                            $arr[$day][$i] = $classename;
                        }
                    }
                }
            }
            return [$arr,$studentinfo];
    }

}


