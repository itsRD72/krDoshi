<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
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
