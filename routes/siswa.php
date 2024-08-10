<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\Siswa\Dashboard;
use App\Http\Controllers\Auth\Siswa\Keamanan;
use App\Http\Controllers\Auth\Siswa\Statistik;
use App\Http\Controllers\Auth\Siswa\Tentang;
use App\Http\Controllers\Auth\Siswa\Peringkat;
use App\Http\Controllers\Auth\Siswa\Presensi;
use App\Http\Controllers\Auth\Siswa\Profil;
use Illuminate\Support\Facades\Route;

Route::name('siswa.')->prefix('siswa')->middleware(['auth:siswa', 'auth.session'])->group(function () {
    // Dashboard
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'siswaLogout'])->name('logout');

    // Pengaturan
    Route::get('/keamanan', [Keamanan::class, 'index'])->name('keamanan');
    Route::name('keamanan.')->prefix('keamanan.')->group(function () {
        Route::get('/{keamanan}', [Keamanan::class, 'show'])->name('show');
        Route::get('/{keamanan}/edit', [Keamanan::class, 'edit'])->name('edit');
        Route::put('/{keamanan}', [Keamanan::class, 'update'])->name('update');
        Route::delete('/{keamanan}', [Keamanan::class, 'destroy'])->name('destroy');
    });

    // Statistik
    Route::get('/statistik', [Statistik::class, 'index'])->name('statistik');
    Route::name('statistik.')->prefix('statistik.')->group(function () {
        Route::get('/{statistik}', [Statistik::class, 'show'])->name('show');
        Route::get('/{statistik}/edit', [Statistik::class, 'edit'])->name('edit');
        Route::put('/{statistik}', [Statistik::class, 'update'])->name('update');
        Route::delete('/{statistik}', [Statistik::class, 'destroy'])->name('destroy');
    });

    // Tentang
    Route::get('/tentang', [Tentang::class, 'index'])->name('tentang');
    Route::name('tentang.')->prefix('tentang.')->group(function () {
        Route::get('/{tentang}', [Tentang::class, 'show'])->name('show');
        Route::get('/{tentang}/edit', [Tentang::class, 'edit'])->name('edit');
        Route::put('/{tentang}', [Tentang::class, 'update'])->name('update');
        Route::delete('/{tentang}', [Tentang::class, 'destroy'])->name('destroy');
    });

    // Peringkat
    Route::get('/peringkat', [Peringkat::class, 'index'])->name('peringkat');
    Route::name('peringkat.')->prefix('peringkat.')->group(function () {
        Route::get('/{peringkat}', [Peringkat::class, 'show'])->name('show');
        Route::get('/{peringkat}/edit', [Peringkat::class, 'edit'])->name('edit');
        Route::put('/{peringkat}', [Peringkat::class, 'update'])->name('update');
        Route::delete('/{peringkat}', [Peringkat::class, 'destroy'])->name('destroy');
    });

    // Presensi
    Route::get('/presensi', [Presensi::class, 'index'])->name('presensi');
    Route::name('presensi.')->prefix('presensi.')->group(function () {
        Route::get('/{presensi}', [Presensi::class, 'show'])->name('show');
        Route::get('/{presensi}/edit', [Presensi::class, 'edit'])->name('edit');
        Route::put('/{presensi}', [Presensi::class, 'update'])->name('update');
        Route::delete('/{presensi}', [Presensi::class, 'destroy'])->name('destroy');
    });

    // Profil
    Route::get('/profil', [Profil::class, 'index'])->name('profil');
    Route::name('profil.')->prefix('profil.')->group(function () {
        Route::get('/{profil}', [Profil::class, 'show'])->name('show');
        Route::get('/{profil}/edit', [Profil::class, 'edit'])->name('edit');
        Route::put('/{profil}', [Profil::class, 'update'])->name('update');
        Route::delete('/{profil}', [Profil::class, 'destroy'])->name('destroy');
    });
});
