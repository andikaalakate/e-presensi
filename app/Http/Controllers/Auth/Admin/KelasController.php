<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Kelas::with('jurusan', 'tahunAjaran', 'waliKelas')->latest()->filterByKelas();
        $kelas = $query->paginate(5)->withQueryString();

        $title = 'Kelas';
        
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => $title, 'url' => ''],
        ];

        return view('auth.admin.pages.kelas', [
            'title' => $title,
            'breadcrumbs' => $breadcrumbs,
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Kelas';

        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Kelas', 'url' => route('admin.kelas')],
            ['label' => $title, 'url' => ''],
        ];

        return view('auth.admin.kelas.pages.create', [
            'title' => $title,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'angkatan_kelas' => 'required|in:X,XI,XII',
            'kelas_ke' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            $kelas = new Kelas($request->only([
                'nama_kelas',
                'jurusan_id',
                'tahun_ajaran_id',
            ]));

            $singkatan_jurusan = Jurusan::find($request->jurusan_id)->singkatan_jurusan;

            $angkatan_kelas = $request->angkatan_kelas;

            $nama_kelas = $angkatan_kelas . ' - ' . $singkatan_jurusan;

            if ($request->has('kelas_ke')) {
                $kelas->nama_kelas = $angkatan_kelas . ' - ' . $singkatan_jurusan . ' - ' . $request->kelas_ke;
            }

            $kelas->nama_kelas = $nama_kelas;
            $kelas->save();

            DB::commit();

            Alert::success('Success', 'Kelas Berhasil Ditambahkan!');
            return redirect()->route('admin.kelas');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error', 'Gagal Menambahkan Kelas!' . $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::with('jurusan', 'tahunAjaran')->find($id);

        $title = 'Detail Kelas';
        
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Kelas', 'url' => route('admin.kelas')],
            ['label' => $title, 'url' => ''],
        ];
        return view('auth.admin.kelas.pages.show', [
            'title' => $title,
            'breadcrumbs' => $breadcrumbs,
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::with('jurusan', 'tahunAjaran')->find($id);

        $title = 'Edit Kelas';
        
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Kelas', 'url' => route('admin.kelas')],
            ['label' => $title, 'url' => ''],
        ];

        return view('auth.admin.kelas.pages.edit', [
            'title' => $title,
            'breadcrumbs' => $breadcrumbs,
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'angkatan_kelas' => 'required|in:X,XI,XII',
            'kelas_ke' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            $kelas = Kelas::find($id);
            $kelas->update($request->only([
                'nama_kelas',
                'jurusan_id',
                'tahun_ajaran_id',
            ]));

            $singkatan_jurusan = Jurusan::find($request->jurusan_id)->singkatan_jurusan;

            $angkatan_kelas = $request->angkatan_kelas;

            $nama_kelas = $angkatan_kelas . ' - ' . $singkatan_jurusan;

            if ($request->has('kelas_ke')) {
                $kelas->nama_kelas = $angkatan_kelas . ' - ' . $singkatan_jurusan . ' - ' . $request->kelas_ke;
            }

            $kelas->nama_kelas = $nama_kelas;
            $kelas->save();

            DB::commit();
            Alert::success('Success', 'Kelas Berhasil Diubah!');
            return redirect()->route('admin.kelas');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error', 'Gagal Mengubah Kelas!' . $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $kelas = Kelas::find($id);
            $kelas->delete();

            DB::commit();
            Alert::success('Success', 'Kelas Berhasil Dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error', 'Gagal Menghapus Kelas!' . $th->getMessage());
            return redirect()->back();
        }
    }
}
