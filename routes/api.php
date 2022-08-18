<?php

    use App\Http\Controllers\CourseController;
    use App\Http\Controllers\MajorController;
    use App\Http\Controllers\manager\ClasseController;
    use App\Http\Controllers\manager\DivisionController;
    use App\Http\Controllers\manager\DivisonStudentController;
    use App\Http\Controllers\SubjectController;
    use App\Models\Major;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::get('/{course}', [CourseController::class, 'info'])->name('courses.info');
    Route::get('/subject/getSubjectByMajor', [SubjectController::class, 'getSubjectByMajor'])->name('subject.getSubjectByMajor');
    Route::get('/division/info', [DivisionController::class, 'info'])->name('division.info');
    Route::get('/division/info2', [DivisionController::class, 'info2'])->name('division.info2');
    Route::get('/division/set', [DivisionController::class, 'set'])->name('division.set');
    Route::get('/division/edit', [DivisionController::class, 'edit'])->name('division.edit');
    Route::get('/division/unset', [DivisionController::class, 'unset'])->name('division.unset');

    Route::get('/divisionStudent/info', [DivisonStudentController::class, 'info'])->name('divisionStudent.info');
    Route::post('/divisionStudent/set', [DivisonStudentController::class, 'set'])->name('divisionStudent.set');

    Route::post('/classes/point_list', [ClasseController::class, 'point_list'])->name('classes.point_list');
    Route::post('/classes/setPointList', [ClasseController::class, 'setPointList'])->name('classes.setPointList');

