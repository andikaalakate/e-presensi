<?php

use App\Http\Controllers\Auth\Admin\Dashboard;
use App\Http\Controllers\Auth\Admin\Jurusan;
use App\Http\Controllers\Auth\Admin\Kelas;
use App\Http\Controllers\Auth\Admin\Laporan;
use App\Http\Controllers\Auth\Admin\Pengguna;
use App\Http\Controllers\Auth\Admin\Siswa;
use App\Http\Controllers\Auth\Admin\Peringkat;
use App\Http\Controllers\Auth\Admin\Presensi;
use App\Http\Controllers\Auth\Admin\Profil;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->middleware(['auth:admin', 'auth.session'])->group(function () {
    // Dashboard
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'adminLogout'])->name('logout');

    // Siswa
    Route::get('/siswa', [Siswa::class, 'index'])->name('siswa');
    Route::name('siswa.')->prefix('siswa.')->group(function () {
        Route::get('/{siswa}', [Siswa::class, 'show'])->name('show');
        Route::get('/{siswa}/edit', [Siswa::class, 'edit'])->name('edit');
        Route::put('/{siswa}', [Siswa::class, 'update'])->name('update');
        Route::delete('/{siswa}', [Siswa::class, 'destroy'])->name('destroy');
    });

    // Jurusan
    Route::get('/jurusan', [Jurusan::class, 'index'])->name('jurusan');
    Route::name('jurusan.')->prefix('jurusan.')->group(function () {
        Route::get('/{jurusan}', [Jurusan::class, 'show'])->name('show');
        Route::get('/{jurusan}/edit', [Jurusan::class, 'edit'])->name('edit');
        Route::put('/{jurusan}', [Jurusan::class, 'update'])->name('update');
        Route::delete('/{jurusan}', [Jurusan::class, 'destroy'])->name('destroy');
    });

    // Kelas
    Route::get('/kelas', [Kelas::class, 'index'])->name('kelas');
    Route::name('kelas.')->prefix('kelas.')->group(function () {
        Route::get('/{kelas}', [Kelas::class, 'show'])->name('show');
        Route::get('/{kelas}/edit', [Kelas::class, 'edit'])->name('edit');
        Route::put('/{kelas}', [Kelas::class, 'update'])->name('update');
        Route::delete('/{kelas}', [Kelas::class, 'destroy'])->name('destroy');
    });

    // Pengguna 
    Route::get('/pengguna', [Pengguna::class, 'index'])->name('pengguna');
    Route::name('pengguna.')->prefix('pengguna.')->group(function () {
        Route::get('/{pengguna}', [Pengguna::class, 'show'])->name('show');
        Route::get('/{pengguna}/edit', [Pengguna::class, 'edit'])->name('edit');
        Route::put('/{pengguna}', [Pengguna::class, 'update'])->name('update');
        Route::delete('/{pengguna}', [Pengguna::class, 'destroy'])->name('destroy');
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

    // Laporan
    Route::get('/laporan', [Laporan::class, 'index'])->name('laporan');
    Route::name('laporan.')->prefix('laporan.')->group(function () {
        Route::get('/{laporan}', [Laporan::class, 'show'])->name('show');
        Route::get('/{laporan}/edit', [Laporan::class, 'edit'])->name('edit');
        Route::put('/{laporan}', [Laporan::class, 'update'])->name('update');
        Route::delete('/{laporan}', [Laporan::class, 'destroy'])->name('destroy');
    });
});
