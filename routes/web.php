<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\HomeController::class, 'index']);

Route::get('teachers', [Controllers\TeacherController::class, 'index']);
Route::get('teachers/add', [Controllers\TeacherController::class, 'addTeacher']);
Route::post('teachers/store', [Controllers\TeacherController::class, 'storeTeacher']);

Route::get('students', [Controllers\StudentController::class, 'index']);
Route::get('students/add', [Controllers\StudentController::class, 'addStudent']);
Route::post('students/store', [Controllers\StudentController::class, 'storeStudent']);
Route::get('students/edit/{studentId}', [Controllers\StudentController::class, 'editStudent']);
Route::patch('students/store/{studentId}', [Controllers\StudentController::class, 'storeStudent']);
Route::get('students/delete/{studentId}', [Controllers\StudentController::class, 'deleteStudent']);

Route::get('student-marks', [Controllers\StudentController::class, 'studentMarks']);
Route::get('student-marks/add', [Controllers\StudentController::class, 'addStudentMark']);
Route::post('student-marks/store', [Controllers\StudentController::class, 'storeStudentMark']);
Route::get('student-marks/edit/{studentMarkId}', [Controllers\StudentController::class, 'editStudentMark']);
Route::patch('student-marks/store/{studentMarkId}', [Controllers\StudentController::class, 'storeStudentMark']);
Route::get('student-marks/delete/{studentMarkId}', [Controllers\StudentController::class, 'deleteStudentMark']);