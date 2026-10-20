<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

// Rute Autentikasi (Bisa diakses Guest / Tanpa Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rute Kepegawaian (Wajib Login / Middleware Auth)
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('employees.index');
    });

    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeeController::class);
});