<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use ProtoneMedia\Splade\Facades\Toast;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::latest()->filterByUser();
        $penggunas = $query->paginate(5)->withQueryString();

        return view('auth.admin.pages.pengguna', [
            'title' => 'Pengguna',
            'penggunas' => $penggunas
        ]);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'pengguna.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        if (!$request->hasFile('file')) {
            Toast::title('Gagal!')->danger()->rightTop()->autoDismiss(5)->message('File Tidak Diupload!');
            return redirect()->back();
        }
        
        try {
            DB::beginTransaction();

            Excel::import(new UsersImport, $request->file('file'));

            DB::commit();

            Toast::title('Sukses!')->success()->rightTop()->autoDismiss(5)->message('Pengguna Berhasil Diimport!');
            
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("Error saat mengimport Pengguna: " . $e->getMessage());

            Toast::title('Error!')->danger()->rightTop()->autoDismiss(5)->message('Gagal Mengimport Pengguna!');

            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.admin.pengguna.pages.create', [
            'title' => 'Tambah Pengguna',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('auth.admin.pengguna.pages.edit', [
            'title' => 'Edit Pengguna',
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
        try {
            DB::beginTransaction();

            $kelas = User::find($id);
            $kelas->delete();

            DB::commit();
            Toast::title('Sukses!')->success()->rightTop()->autoDismiss(5)->message('Pengguna Berhasil Dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Toast::title('Error!')->danger()->rightTop()->autoDismiss(5)->message('Gagal Menghapus Pengguna!');
            return redirect()->back();
        }
    }

    public function destroyMultiple(Request $request)
    {
        $ids = $request->input('ids');

        if (!$ids) {
            Toast::title('Gagal!')->danger()->rightTop()->autoDismiss(5)->message('Pengguna Tidak Ditemukan!');
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            User::whereIn('id', $ids)->delete();
            DB::commit();
            Toast::title('Sukses!')->success()->rightTop()->autoDismiss(5)->message('Pengguna Berhasil Dihapus!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error saat menghapus Pengguna: " . $e->getMessage());
            Toast::title('Error!')->danger()->rightTop()->autoDismiss(5)->message('Gagal Menghapus Pengguna!');
            return redirect()->back();
        }
    }
}
