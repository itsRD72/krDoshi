<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.login')->name('admin.login');

Route::view('/admin/add-staf', 'admin.add-staff')->name('add-staff-form');
Route::post('add-staff', [UserController::class, 'addStaff'])->name('add-staff');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');

Route::view('/admin/staff-list', 'admin.staff-list')->name('staff-list');
Route::get('/admin/staff-list',[UserController::class,'staffList'])->name('staff-list-page');

Route::get('/admin/editStaff/{id}',[UserController::class,'editStaff'])->name('editstaff-form');
Route::post('/updateStaff/{id}',[UserController::class,'updateStaff'])->name('update-staff');