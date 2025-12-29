<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('add-center-form','add-center-form');
Route::view('add-course-form','add-course-form');
Route::view('add-batch-form','add-batches-form');
Route::view('add-student-form','add-student-form');
Route::view('add-mcq-form','add-mcq-form');
Route::view('test','test');