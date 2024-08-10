<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\Siswa\DashboardController;
use App\Http\Controllers\Auth\Siswa\KeamananController;
use App\Http\Controllers\Auth\Siswa\StatistikController;
use App\Http\Controllers\Auth\Siswa\TentangController;
use App\Http\Controllers\Auth\Siswa\PeringkatController;
use App\Http\Controllers\Auth\Siswa\PresensiController;
use App\Http\Controllers\Auth\Siswa\ProfilController;
use Illuminate\Support\Facades\Route;

Route::name('siswa.')->prefix('siswa')->middleware(['auth:siswa', 'auth.session'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'siswaLogout'])->name('logout');

    // Pengaturan
    Route::get('/keamanan', [KeamananController::class, 'index'])->name('keamanan');
    Route::name('keamanan.')->prefix('keamanan.')->group(function () {
        Route::get('/{keamanan}', [KeamananController::class, 'show'])->name('show');
        Route::get('/{keamanan}/edit', [KeamananController::class, 'edit'])->name('edit');
        Route::put('/{keamanan}', [KeamananController::class, 'update'])->name('update');
        Route::delete('/{keamanan}', [KeamananController::class, 'destroy'])->name('destroy');
    });

    // Statistik
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');
    Route::name('statistik.')->prefix('statistik.')->group(function () {
        Route::get('/{statistik}', [StatistikController::class, 'show'])->name('show');
    });

    // Tentang
    Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
    Route::name('tentang.')->prefix('tentang.')->group(function () {
        Route::get('/{tentang}', [TentangController::class, 'show'])->name('show');
    });

    // Peringkat
    Route::get('/peringkat', [PeringkatController::class, 'index'])->name('peringkat');
    Route::name('peringkat.')->prefix('peringkat.')->group(function () {
        Route::get('/{peringkat}', [PeringkatController::class, 'show'])->name('show');
    });

    // Presensi
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi');
    Route::name('presensi.')->prefix('presensi.')->group(function () {
        Route::get('/create', [PresensiController::class, 'create'])->name('create');
        Route::post('/store', [PresensiController::class, 'store'])->name('store');
        Route::get('/{presensi}', [PresensiController::class, 'show'])->name('show');
        Route::put('/{presensi}', [PresensiController::class, 'update'])->name('update');
    });

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::name('profil.')->prefix('profil.')->group(function () {
        Route::get('/{profil}', [ProfilController::class, 'show'])->name('show');
        Route::get('/{profil}/edit', [ProfilController::class, 'edit'])->name('edit');
        Route::put('/{profil}', [ProfilController::class, 'update'])->name('update');
        Route::delete('/{profil}', [ProfilController::class, 'destroy'])->name('destroy');
    });
});
