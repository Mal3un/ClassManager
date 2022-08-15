<?php

namespace App\Http\Controllers\manager;

use App\Enums\ClassTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Classe;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;
use App\Models\Course;
use App\Models\Major;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class ClasseController extends Controller
{

    use ResponseTrait;

    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Classe::query();
        $this->table = (new Classe())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }
    public function index(Request $request)
    {
        $selectedCourse = $request->get('course');
        $selectedMajor = $request->get('major');
        $selectedClassType = $request->get('classType');
        $selectedTeacher = $request->get('teacher');
        $selectedSubject = $request->get('subject');
        $query = $this->model->clone()
            ->with(['major:id,name', 'teacher:id,first_name,last_name,gender,email', 'course:id,name','subject:id,name' ])
            ->latest();

        if($selectedClassType !== 'All...' && !empty($selectedClassType)){
            $query->where('class_type',  $selectedClassType);
        }
        if($selectedSubject !== 'All...' && !empty($selectedSubject)){
            $query->where('subject_id',  $selectedSubject);
        }
        if($selectedCourse !== 'All...' && !empty($selectedCourse)){
            $query->whereHas('course',  function($q) use ($selectedCourse){
                return $q->where('course_id',$selectedCourse);
            });
        }

        if($selectedMajor !== 'All...' && !empty($selectedMajor)){
            $query->whereHas('major',  function($q) use ($selectedMajor){
                return $q->where('major_id',$selectedMajor);
            });
        }
        if($selectedTeacher !== 'All...' && !empty($selectedTeacher)){
            $query->whereHas('teacher',  function($q) use ($selectedTeacher){
                return $q->where('teacher_id',$selectedTeacher );
            });
        }
        $data = $query->paginate();
        $teacher = Teacher::query()
            ->get([
                'id',
                'first_name',
                'last_name',
                'first_name',
                'gender',
                'email'
            ]);
        $course = Course::query()
            ->get([
                'id',
                'name',
            ]);
        $major = Major::query()
            ->get([
                'id',
                'name',
            ]);
        $subject= Subject::query()
            ->get([
                'id',
                'name',
            ]);
        $class_type = ClassTypeEnum::asArray();
        return view('manager.classes.index', [
            'data' => $data,
            'class_types' => $class_type,
            'teachers'=>$teacher,
            'courses'=>$course,
            'majors'=>$major,
            'subjects'=>$subject,

            'selectedCourse'=> $selectedCourse,
            'selectedMajor'=> $selectedMajor,
            'selectedClassType'=> $selectedClassType,
            'selectedTeacher'=> $selectedTeacher,
            'selectedSubject'=> $selectedSubject,
            ]);
    }
    function myclass(){
        dd(auth()->id());
        return view('manager.classes.myclass');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(StoreClasseRequest $request) : JsonResponse
    {
        DB::beginTransaction();
        try{
            $quality = (int) $request->get('quality-class');
            if($quality > 1 ){
                for($i = 1; $i <= $quality; $i++){
                    $name = str_replace('1.1', "1.$i", $request->get('name'));
                    $data = $request->only([
                        'major_id',
                        'course_id',
                        'class_type',
                        'subject_id',
                        'start_date',
                        'end_date',
                        'all_session'
                    ]);
                    $data['name'] =  $name;
                    Classe::create($data);
                }
            }else{
                $arr = $request->only([
                    "course_id",
                    "major_id",
                    "class_type",
                    "subject_id",
                    "name",
                    'start_date',
                    'end_date',
                    ]);
                Classe::create($arr);
            }
            DB::commit();
            return $this->successResponse();
        } catch (Throwable $e){
            DB::rollback();
            return $this->errorResponse($e, 500);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClasseRequest  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClasseRequest $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
