<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = TahunAjaran::with('kelas')->latest();
        $tahunAjarans = $query->paginate(5);

        return view('auth.admin.pages.tahun-ajaran', [
            'title' => 'Tahun Ajaran',
            'tahunAjarans' => $tahunAjarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.admin.tahun-ajaran.pages.create', [
            'title' => 'Tambah Tahun Ajaran',
        ]);
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
        return view('auth.admin.tahun-ajaran.pages.show', [
            'title' => 'Lihat Tahun Ajaran',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('auth.admin.tahun-ajaran.pages.edit', [
            'title' => 'Edit Tahun Ajaran',
        ]);
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
