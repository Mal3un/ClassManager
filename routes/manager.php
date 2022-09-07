<?php

    use App\Http\Controllers\MajorController;
    use App\Http\Controllers\manager\ClasseController;
    use App\Http\Controllers\manager\CourseController;
    use App\Http\Controllers\manager\DivisionController;
    use App\Http\Controllers\manager\DivisonStudentController;
    use App\Http\Controllers\manager\StudentController;
    use App\Http\Controllers\manager\SubjectController;
    use App\Http\Controllers\manager\UserController;
    use App\Http\Controllers\TeacherController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    Route::get('/', function () {
        return view('manager.index', [
            'title' => 'Manager',
        ]);
    })->name('welcome');

    Route::group([
        'as'     => 'courses.',
        'prefix' => 'courses',
    ], static function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::post('/store', [CourseController::class, 'store'])->name('store');
        Route::get('/{course}', [CourseController::class, 'edit'])->name('edit');
        Route::delete('/{course}', [CourseController::class, 'destroy'])->name('destroy');
        Route::post('/{course}', [CourseController::class, 'update'])->name('update');
//        Route::post('/import-csv', [PostController::class, 'importCsv'])->name('import_csv');
    });
    Route::group([
        'as'     => 'majors.',
        'prefix' => 'majors',
    ], static function () {
        Route::get('/', [MajorController::class, 'index'])->name('index');
//        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [MajorController::class, 'store'])->name('store');
//        Route::post('/import-csv', [PostController::class, 'importCsv'])->name('import_csv');
    });
    Route::group([
        'as'     => 'classes.',
        'prefix' => 'classes',
    ], static function () {
        Route::get('/', [ClasseController::class, 'index'])->name('index');
        Route::get('/edit', [ClasseController::class, 'edit'])->name('edit');
//        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [ClasseController::class, 'store'])->name('store');
        Route::post('point_list/{id}', [ClasseController::class, 'point_list'])->name('point_list');
        Route::post('/{classId}', [ClasseController::class, 'show'])->name('show');

//        Route::post('/import-csv', [PostController::class, 'importCsv'])->name('import_csv');

    });
    Route::group([
        'as'     => 'division.',
        'prefix' => 'division',
    ], static function () {
        Route::get('/danhsach', [DivisionController::class, 'index'])->name('index');
        Route::get('/phancong', [DivisionController::class, 'index2'])->name('index2');
//        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [DivisionController::class, 'store'])->name('store');
//        Route::post('/import-csv', [PostController::class, 'importCsv'])->name('import_csv');
    });

    Route::group([
        'as'     => 'divisionstudent.',
        'prefix' => 'divisionstudent',
    ], static function () {
        Route::get('/', [DivisonStudentController::class, 'index'])->name('index');

    });

    Route::group([
        'as'     => 'students.',
        'prefix' => 'students',
    ], static function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('/schedule', [StudentController::class, 'schedule'])->name('schedule');
    });
    Route::group([
        'as'     => 'teachers.',
        'prefix' => 'teachers',
    ], static function () {
        Route::get('/', [TeacherController::class, 'index'])->name('index');
    });
    Route::group([
        'as'     => 'subjects.',
        'prefix' => 'subjects',
    ], static function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');

        Route::post('/store', [SubjectController::class, 'store'])->name('store');

    });

    Route::group([
        'as'     => 'users.',
        'prefix' => 'users',
    ], static function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');

    });


