<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    // Login Admin
    Route::get('/login', [AuthController::class, 'loginAdmin'])->middleware('auth.check')->name('admin.login');
    Route::post('/proses-login', [AuthController::class, 'adminLogin'])->name('admin.proses-login');
});

Route::prefix('siswa')->middleware('guest:siswa')->group(function () {
    // Login Siswa
    Route::get('/login', [AuthController::class, 'loginSiswa'])->middleware('auth.check')->name('login');
    Route::post('/proses-login', [AuthController::class, 'siswaLogin'])->name('siswa.proses-login');
});
