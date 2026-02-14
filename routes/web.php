<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.login')->name('admin.login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::view('/admin/add-staf', 'admin.add-staff')->name('add-staff-form');
Route::post('add-staff', [UserController::class, 'addStaff'])->name('add-staff');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');

Route::view('/admin/staff-list', 'admin.staff-list')->name('staff-list');
Route::get('/admin/staff-list', [UserController::class, 'staffList'])->name('staff-list-page');

Route::get('/admin/editStaff/{id}', [UserController::class, 'editStaff'])->name('editstaff-form');
Route::post('/updateStaff/{id}', [UserController::class, 'updateStaff'])->name('update-staff');
Route::get('admin/deleteStaff/{id}', [UserController::class, 'deleteStaff'])->name('delete-staff');

Route::view('/admin/add-course', 'admin.add-course')->name('add-course-page');
Route::post('add-course', [CourseController::class, 'addCourse'])->name('add-course');
Route::get('/courses', [CourseController::class, 'courseList'])->name('course-list-page');

Route::get('/admin/editCourse/{id}', [CourseController::class, 'editCourse'])->name('edit-course');
Route::post('/updateCourse/{id}', [CourseController::class, 'updateCourse'])->name('update-course');
Route::get('admin/deleteCourse/{id}', [CourseController::class, 'deleteCourse'])->name('delete-course');

Route::get('/admin/batch', [BatchController::class, 'batch'])->name('add-batch-page');
Route::post('/admin/addBatch', [BatchController::class, 'addBatch'])->name('add-batch');


Route::view('/admin/batch-list', 'admin.batch-list')->name('batch-list-page');
Route::get('/admin/batch-list', [BatchController::class, 'batchList'])->name('batch-list');

Route::get('/admin/editBatch/{id}', [BatchController::class, 'editBatch'])->name('editbatch-form');
Route::post('/updateBatch/{id}', [BatchController::class, 'updateBatch'])->name('update-batch');
Route::get('admin/deleteBatch/{id}', [BatchController::class, 'deleteBatch'])->name('delete-batch');


Route::view('/admin/center', 'admin.add-center')->name('add-center-page');
Route::post('/admin/addCenter', [CenterController::class, 'addCenter'])->name('add-center');

Route::get('/admin/center-list', [CenterController::class, 'centerList'])->name('center-list');

Route::get('/admin/editCenter/{id}', [CenterController::class, 'editCenter'])->name('editcenter-form');
Route::post('/updateCenter/{id}', [CenterController::class, 'updateCenter'])->name('update-center');
Route::get('admin/deleteCenter/{id}', [CenterController::class, 'deleteCenter'])->name('delete-center');


Route::get('/admin/student', [StudentController::class, 'student'])
    ->name('add-student-page');

Route::post('/admin/student', [StudentController::class, 'addStudent'])
    ->name('add-student');


Route::get('/admin/student-list', [StudentController::class, 'studentList'])->name('student-list-page');
Route::get('admin/studentview/{id}',[StudentController::class,'viewStudent'])->name('view-student');

Route::get('/admin/editStudent/{id}', [StudentController::class, 'editStudent'])->name('editstudent-form');
Route::post('/updateStudent/{id}', [StudentController::class, 'updateStudent'])->name('update-student');
Route::get('admin/deleteStudent/{id}', [StudentController::class, 'deleteStudent'])->name('delete-student');
