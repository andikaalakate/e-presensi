<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.admin.pages.presensi', [
            'title' => 'Presensi',
        ]);
    }

    public function autofill(Request $request)
    {
        $siswa = Siswa::with('kelas.jurusan', 'kelas.tahunAjaran')->where('nisn', $request->nisn)->first();

        if ($siswa->jenis_kelamin == 'Laki-Laki') {
            $default_foto = 'default-l.png';
        } else {
            $default_foto = 'default-p.png';
        }

        if ($siswa) {
            return response()->json([
                'nama' => $siswa->nama_lengkap,
                'kelas_nama' => $siswa->kelas->nama_kelas ?? 'Tidak ada kelas',
                'jurusan_nama' => $siswa->kelas->jurusan->nama_jurusan ?? 'Tidak ada jurusan',
                'tahun_mulai' => $siswa->kelas->tahunAjaran->tahun_mulai ?? 'Tidak ada data tahun ajaran',
                'tahun_berakhir' => $siswa->kelas->tahunAjaran->tahun_selesai ?? 'Tidak ada data tahun ajaran',
                'foto' => $siswa->foto ?? $default_foto,
            ]);
        }

        return response()->json(null);
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
        $message = [
            'nisn.required' => 'NISN harus diinput.',
            'nisn.exists' => 'NISN yang diinput tidak valid.',
        ];

        $validator = Validator::make($request->all(), [
            'nisn' => 'required|exists:siswas,nisn',
        ], $message);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = $errors;
            Alert::toast($errorMessage, 'error');
            return redirect()->back()->withInput();
        }

        $now = Carbon::now();

        try {
            DB::beginTransaction();

            $presensiHariIni = Presensi::where('nisn', $request->nisn)
                ->whereDate('created_at', $now->toDateString())
                ->first();

            if (!$presensiHariIni) {
                $presensi = new Presensi([
                    'nisn' => $request->nisn,
                    'status' => $now->format('H:i:s') <= '07:15:00' ? 'Hadir' : 'Terlambat',
                    'jam_masuk' => $now->format('H:i:s')
                ]);

                $presensi->save();
                $presensi->updateSkor();
            } else {
                $result = $presensiHariIni->recordPulang();
                if ($result === true) {
                    Alert::toast('Presensi pulang berhasil disimpan!', 'success');
                } elseif ($result === false) {
                    Alert::toast('Waktu presensi harus lewat dari 14:00!', 'error');
                } else {
                    Alert::toast('Anda sudah melakukan presensi hari ini!', 'error');;
                }

                DB::commit();
                return redirect()->back();
            }

            DB::commit();

            Alert::toast('Data presensi berhasil disimpan!', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::toast('Gagal menyimpan data presensi!' . $e->getMessage(), 'error');
            return redirect()->back();
        }
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
