<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('add-center-form','add-center-form');
Route::view('add-course-form','add-course-form');
Route::view('add-batch-form','add-batches-form');

Route::view('add-mcq-form','add-mcq-form');
Route::view('test','test');

Route::get('add-student-form', [StudentController::class, 'create']); 
Route::post('/students', [StudentController::class, 'store']);

