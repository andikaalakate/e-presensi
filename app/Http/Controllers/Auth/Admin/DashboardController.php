<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Presensi;
use App\Models\WaliKelas;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countData = [
            'siswa' => Siswa::count(),
            'waliKelas' => WaliKelas::count(),
            'pengguna' => User::count(),
            'kelas' => Kelas::count(),
            'jurusan' => Jurusan::count(),
            'presensiHadir' => Presensi::where('status', 'Hadir')->count(),
            'presensiAbsen' => Presensi::where('status', 'Alpha')->count(),
            'presensiTerlambat' => Presensi::where('status', 'Terlambat')->count(),
            'presensiSakit' => Presensi::where('status', 'Sakit')->count(),
            'presensiIzin' => Presensi::where('status', 'Izin')->count(),
            'tahunAjaran' => TahunAjaran::count(),
        ];
        
        return view('auth.admin.pages.dashboard', array_merge(['title' => 'Dashboard'], $countData));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
