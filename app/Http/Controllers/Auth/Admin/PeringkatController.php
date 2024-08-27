<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PeringkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Skor::with('presensi', 'siswa')
            ->filterBySiswa()
            ->orderBy('skor', 'desc');

        $peringkatGlobal = Cache::get('peringkat_global');

        if (!$peringkatGlobal) {
            $peringkatGlobal = $query->get();
            $peringkatGlobal->each(function ($item, $index) {
                $item->global_rank = $index + 1;
            });

            Cache::put('peringkat_global', $peringkatGlobal, now()->addMinutes(10));
        }

        $peringkat = $query->paginate(25)->withQueryString();

        return view('auth.admin.pages.peringkat', [
            'title' => 'Peringkat',
            'peringkat' => $peringkat
        ]);
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
