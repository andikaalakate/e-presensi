<?php

use App\Http\Controllers\Auth\Admin\DashboardController;
use App\Http\Controllers\Auth\Admin\JurusanController;
use App\Http\Controllers\Auth\Admin\KelasController;
use App\Http\Controllers\Auth\Admin\LaporanController;
use App\Http\Controllers\Auth\Admin\PenggunaController;
use App\Http\Controllers\Auth\Admin\SiswaController;
use App\Http\Controllers\Auth\Admin\PeringkatController;
use App\Http\Controllers\Auth\Admin\PresensiController;
use App\Http\Controllers\Auth\Admin\ProfilController;
use App\Http\Controllers\Auth\Admin\TahunAjaranController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->middleware(['splade', 'auth:admin', 'auth.session'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'adminLogout'])->name('logout');

    // Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::name('siswa.')->prefix('siswa')->group(function () {
        Route::get('/create', [SiswaController::class, 'create'])->middleware(['permission:tambah-siswa'])->name('create');
        Route::post('/store', [SiswaController::class, 'store'])->middleware(['permission:tambah-siswa'])->name('store');
        Route::get('/{siswa}', [SiswaController::class, 'show'])->middleware(['permission:lihat-siswa'])->name('show');
        Route::get('/{siswa}/edit', [SiswaController::class, 'edit'])->middleware(['permission:edit-siswa'])->name('edit');
        Route::put('/{siswa}', [SiswaController::class, 'update'])->middleware(['permission:edit-siswa'])->name('update');
        Route::delete('/{siswa}', [SiswaController::class, 'destroy'])->middleware(['permission:hapus-siswa'])->name('destroy');
    });

    // Tahun Ajaran
    Route::get('/tahun-ajaran', [TahunAjaranController::class, 'index'])->name('tahun-ajaran');
    Route::name('tahun-ajaran.')->prefix('tahun-ajaran')->group(function () {
        Route::get('/create', [TahunAjaranController::class, 'create'])->name('create');
        Route::post('/store', [TahunAjaranController::class, 'store'])->name('store');
        Route::get('/{tahunAjaran}', [TahunAjaranController::class, 'show'])->name('show');
        Route::get('/{tahunAjaran}/edit', [TahunAjaranController::class, 'edit'])->name('edit');
        Route::put('/{tahunAjaran}', [TahunAjaranController::class, 'update'])->name('update');
        Route::delete('/{tahunAjaran}', [TahunAjaranController::class, 'destroy'])->name('destroy');
    });

    // Jurusan
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::name('jurusan.')->prefix('jurusan')->group(function () {
        Route::get('/create', [JurusanController::class, 'create'])->name('create');
        Route::post('/store', [JurusanController::class, 'store'])->name('store');
        Route::get('/{jurusan}', [JurusanController::class, 'show'])->name('show');
        Route::get('/{jurusan}/edit', [JurusanController::class, 'edit'])->name('edit');
        Route::put('/{jurusan}', [JurusanController::class, 'update'])->name('update');
        Route::delete('/{jurusan}', [JurusanController::class, 'destroy'])->name('destroy');
    });

    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::name('kelas.')->prefix('kelas')->group(function () {
        Route::get('/create', [KelasController::class, 'create'])->name('create');
        Route::post('/store', [KelasController::class, 'store'])->name('store');
        Route::get('/{kelas}', [KelasController::class, 'show'])->name('show');
        Route::get('/{kelas}/edit', [KelasController::class, 'edit'])->name('edit');
        Route::put('/{kelas}', [KelasController::class, 'update'])->name('update');
        Route::delete('/{kelas}', [KelasController::class, 'destroy'])->name('destroy');
    });

    // Pengguna 
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('users-export', [PenggunaController::class, 'export'])->name('pengguna.export');
    Route::name('pengguna.')->prefix('pengguna')->group(function () {
        Route::get('/create', [PenggunaController::class, 'create'])->name('create');
        Route::post('/store', [PenggunaController::class, 'store'])->name('store');
        Route::get('/{pengguna}', [PenggunaController::class, 'show'])->name('show');
        Route::get('/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('edit');
        Route::put('/{pengguna}', [PenggunaController::class, 'update'])->name('update');
        Route::delete('/{pengguna}', [PenggunaController::class, 'destroy'])->name('destroy');
    });

    // Peringkat
    Route::get('/peringkat', [PeringkatController::class, 'index'])->name('peringkat');
    Route::name('peringkat.')->prefix('peringkat')->group(function () {
        Route::get('/create', [PeringkatController::class, 'create'])->name('create');
        Route::post('/store', [PeringkatController::class, 'store'])->name('store');
        Route::get('/{peringkat}', [PeringkatController::class, 'show'])->name('show');
        Route::get('/{peringkat}/edit', [PeringkatController::class, 'edit'])->name('edit');
        Route::put('/{peringkat}', [PeringkatController::class, 'update'])->name('update');
        Route::delete('/{peringkat}', [PeringkatController::class, 'destroy'])->name('destroy');
    });

    // Presensi
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi');
    Route::name('presensi.')->prefix('presensi')->group(function () {
        Route::get('/create', [PresensiController::class, 'create'])->name('create');
        Route::post('/store', [PresensiController::class, 'store'])->name('store');
        Route::get('/autofill', [PresensiController::class, 'autofill'])->name('autofill');
        Route::get('/{presensi}', [PresensiController::class, 'show'])->name('show');
        Route::get('/{presensi}/edit', [PresensiController::class, 'edit'])->name('edit');
        Route::put('/{presensi}', [PresensiController::class, 'update'])->name('update');
        Route::delete('/{presensi}', [PresensiController::class, 'destroy'])->name('destroy');
    });

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::name('profil.')->prefix('profil')->group(function () {
        Route::get('/{profil}', [ProfilController::class, 'show'])->name('show');
        Route::get('/{profil}/edit', [ProfilController::class, 'edit'])->name('edit');
        Route::put('/{profil}', [ProfilController::class, 'update'])->name('update');
        Route::delete('/{profil}', [ProfilController::class, 'destroy'])->name('destroy');
    });

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::name('laporan.')->prefix('laporan')->group(function () {
        Route::get('/{laporan}', [LaporanController::class, 'show'])->name('show');
        Route::get('/{laporan}/edit', [LaporanController::class, 'edit'])->name('edit');
        Route::put('/{laporan}', [LaporanController::class, 'update'])->name('update');
        Route::delete('/{laporan}', [LaporanController::class, 'destroy'])->name('destroy');
    });
});
