<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Jurusan::with('kepalaJurusan', 'kelas')->latest();
        $jurusans = $query->paginate(5);

        return view('auth.admin.pages.jurusan', [
            'title' => 'Jurusan',
            'jurusans' => $jurusans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.admin.jurusan.pages.create', [
            'title' => 'Tambah Jurusan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'singkatan_jurusan' => 'required',
            'kepala_jurusan_id' => 'nullable|exists:users,id',
        ]);

        try {
            DB::beginTransaction();

            $jurusan = new Jurusan($request->only([
                'nama_jurusan',
                'singkatan_jurusan',
                'kepala_jurusan_id',
            ]));

            if ($request->has('kepala_jurusan_id')) {
                $jurusan->kepala_jurusan_id = $request->kepala_jurusan_id;
            }

            $jurusan->save();

            DB::commit();

            Alert::success('Success', 'Jurusan created successfully');
            return redirect()->route('admin.jurusan');
        } catch (\Throwable $th) {
            DB::rollback();

            Alert::error('Error', 'Jurusan created failed');
            return redirect()->route('admin.jurusan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurusan = Jurusan::find($id);

        return view('auth.admin.jurusan.pages.show', [
            'title' => 'Show Jurusan',
            'jurusan' => $jurusan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurusan = Jurusan::find($id);

        return view('auth.admin.jurusan.pages.edit', [
            'title' => 'Edit Jurusan',
            'jurusan' => $jurusan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'singkatan_jurusan' => 'required',
            'kepala_jurusan_id' => 'nullable|exists:users,id',
        ]);

        $jurusan = Jurusan::find($id);

        try {
            DB::beginTransaction();

            $jurusan->update($request->only([
                'nama_jurusan',
                'singkatan_jurusan',
                'kepala_jurusan_id',
            ]));

            if ($request->has('kepala_jurusan_id')) {
                $jurusan->kepala_jurusan_id = $request->kepala_jurusan_id;
            }

            $jurusan->save();

            DB::commit();

            Alert::success('Success', 'Jurusan updated successfully');
            return redirect()->route('admin.jurusan');
        } catch (\Throwable $th) {
            DB::rollback();

            Alert::error('Error', 'Jurusan updated failed');
            return redirect()->route('admin.jurusan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::find($id);

        try {
            DB::beginTransaction();

            $jurusan->delete();

            DB::commit();
            Alert::success('Success', 'Jurusan Berhasil Dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error', 'Jurusan Gagal Dihapus!');
            return redirect()->back();
        }
    }
}
