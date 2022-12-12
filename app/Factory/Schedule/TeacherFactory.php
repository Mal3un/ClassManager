<?php

namespace App\Factory\Schedule;

use App\Models\Classe;
use App\Models\Major;
use App\Models\Teacher;

class TeacherFactory extends ScheduleFactory
{
    public function getSchedule()
    {
            $teacher = Teacher::find($this->user)->only('first_name', 'last_name','birthdate','gender','major_id','course_id');
            $teacher['birthdate'] = date('d/m/Y', strtotime($teacher['birthdate']));
            $teacher['major'] = Major::find($teacher['major_id'])->name;
            $teacherinfo = $teacher;
            $teacher = Classe::where('teacher_id', $this->user)->get();
            $arr = [];
            foreach ($teacher as $each){
                $each->schedule = str_replace(' ', '', $each->schedule);
                if($each->schedule !== '' && $each->schedule !== null){
                    $each->schedule = explode('-', $each->schedule);
                    foreach ($each->schedule as $each2){
                        $day = substr($each2, 0, 1);
                        $time = explode(',',substr($each2, 1));
                        for($i = $time[0]; $i <= $time[1]; $i++){
                            $arr[$day][$i] = $each->name;
                        }
                    }
                }
            }
            return [$arr,$teacherinfo];
    }

}


