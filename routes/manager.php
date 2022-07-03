<?php

    use App\Http\Controllers\manager\ClasseController;
    use App\Http\Controllers\MajorController;
    use App\Http\Controllers\manager\CourseController;
    use App\Http\Controllers\manager\DivisionController;
    use App\Http\Controllers\TeacherController;
    use App\Models\Course;
    use App\Models\Major;
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
//        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [ClasseController::class, 'store'])->name('store');
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
