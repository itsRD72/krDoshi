<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\McqController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* AUTH ROUTES */
Route::view('/', 'admin.login')->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


/* ADMIN PANEL */
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::middleware('role:admin')->group(function () {

        /* ---------- Centers ---------- */
        Route::get('centers', [CenterController::class, 'centerList'])->name('center.index');
        Route::get('add-center', fn() => view('admin.add-center'))->name('center.create');
        Route::post('add-center', [CenterController::class, 'addCenter'])->name('center.store');
        Route::get('edit-center/{id}', [CenterController::class, 'editCenter'])->name('center.edit');
        Route::post('update-center/{id}', [CenterController::class, 'updateCenter'])->name('center.update');
        Route::get('view-center/{id}', [CenterController::class, 'viewCenter'])->name('center.show');
        Route::get('delete-center/{id}', [CenterController::class, 'deleteCenter'])->name('center.delete');

        /* ---------- Courses ---------- */
        Route::get('add-course', [CourseController::class, 'course'])->name('course.create');
        Route::post('add-course', [CourseController::class, 'addCourse'])->name('course.store');
        Route::get('edit-course/{id}', [CourseController::class, 'editCourse'])->name('course.edit');
        Route::post('update-course/{id}', [CourseController::class, 'updateCourse'])->name('course.update');
        Route::get('delete-course/{id}', [CourseController::class, 'deleteCourse'])->name('course.delete');


    });


    /* ADMIN + COORDINATOR */
    Route::middleware('role:admin,coordinator')->group(function () {

        /* Staff List (View + Update) */
        Route::get('add-staff', [UserController::class, 'createStaff'])->name('staff.create');
        Route::get('staff-view/{id}', [UserController::class, 'viewStaff'])->name('staff.show');
        Route::post('add-staff', [UserController::class, 'addStaff'])->name('staff.store');
        Route::get('staff-list', [UserController::class, 'staffList'])->name('staff.index');
        Route::get('edit-staff/{id}', [UserController::class, 'editStaff'])->name('staff.edit');
        Route::post('update-staff/{id}', [UserController::class, 'updateStaff'])->name('staff.update');
        Route::get('delete-staff/{id}', [UserController::class, 'deleteStaff'])->name('staff.delete');

        /* ---------- Courses ---------- */
        Route::get('courses', [CourseController::class, 'courseList'])->name('course.index');

        /* Batches */
        Route::get('add-batch', [BatchController::class, 'batch'])->name('batch.create');
        Route::post('add-batch', [BatchController::class, 'addBatch'])->name('batch.store');
        Route::get('edit-batch/{id}', [BatchController::class, 'editBatch'])->name('batch.edit');
        Route::post('update-batch/{id}', [BatchController::class, 'updateBatch'])->name('batch.update');
        Route::get('delete-batch/{id}', [BatchController::class, 'deleteBatch'])->name('batch.delete');


        /*  Students  */
        Route::get('add-student', [StudentController::class, 'student'])->name('student.create');
        Route::post('add-student', [StudentController::class, 'addStudent'])->name('student.store');
        Route::get('edit-student/{id}', [StudentController::class, 'editStudent'])->name('student.edit');
        Route::post('update-student/{id}', [StudentController::class, 'updateStudent'])->name('student.update');
        Route::get('delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');

        /* ---------- MCQ ---------- */

        Route::get('delete-mcq/{id}', [McqController::class, 'deleteMcq'])->name('mcq.delete');

    });


    /* STAFF ACCESS  */
    Route::middleware('role:admin,coordinator,staff')->group(function () {

        Route::get('staff-view/{id}', [UserController::class, 'viewStaff'])->name('staff.show');
        // View Batches (only their center — filter in controller)
        Route::get('batches', [BatchController::class, 'batchList'])->name('batch.index');

        // Update Students
        Route::get('students', [StudentController::class, 'studentList'])->name('student.index');
        Route::get('view-student/{id}', [StudentController::class, 'viewStudent'])->name('student.show');

        /* ---------- MCQ ---------- */
        Route::get('add-mcq', [McqController::class, 'mcq'])->name('mcq.create');
        Route::post('add-mcq', [McqController::class, 'addMcq'])->name('mcq.store');
        Route::get('mcqs', [McqController::class, 'mcqList'])->name('mcq.index');
        Route::get('edit-mcq/{id}', [McqController::class, 'editMcq'])->name('mcq.edit');
        Route::post('update-mcq/{id}', [McqController::class, 'updateMcq'])->name('mcq.update');

        // Manage Exam
        Route::post('create-paper', [McqController::class, 'createPaper'])->name('mcq.paper');
    });

});


/* ================= AJAX ROUTES ================= */
Route::get('/get-courses', [BatchController::class, 'getCourses'])->name('get-courses');
Route::get('/get-batches/{centerId}/{courseId}', [BatchController::class, 'getBatches'])->name('get-batches');