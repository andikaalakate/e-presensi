<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\OrangTua;
use App\Models\Siswa;
use App\Models\SiswaLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\Splade\Facades\Toast;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Siswa::with('kelas', 'presensi', 'siswaLogin')->filterBySiswa();
        $siswas = $query->paginate(5)->withQueryString();

        return view('auth.admin.pages.siswa', [
            'title' => 'Siswa',
            'siswas' => $siswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();

        return view('auth.admin.siswa.pages.create', [
            'title' => 'Tambah Siswa',
            'kelas' => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nisn.required' => 'NISN harus diisi.',
            'nisn.unique' => 'NISN sudah terdaftar, gunakan NISN yang lain.',
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin yang dipilih tidak valid.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar, gunakan email yang lain.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter.',
            'kelas_id.required' => 'Kelas harus dipilih.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus memiliki format jpeg, png, jpg, gif, atau svg.',
            'foto.max' => 'Foto tidak boleh lebih dari 2MB.',
        ];

        $validator = Validator::make($request->all(), [
            'nisn' => 'required|unique:siswas,nisn',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email|unique:siswas,email',
            'no_telp' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kelas_id' => 'required|exists:kelas,id',
            'password' => 'required|min:8',
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = implode("\n", $errors);

            Toast::title('Error!')
                ->warning()
                ->rightTop()
                ->autoDismiss(5)
                ->message($errorMessage);
            return redirect()->back()->withInput();
        }

        try {
            DB::beginTransaction();

            $siswa = new Siswa($request->only([
                'nisn',
                'nama_lengkap',
                'jenis_kelamin',
                'tanggal_lahir',
                'alamat',
                'email',
                'no_telp',
                'foto',
                'kelas_id',
            ]));

            if ($request->hasFile('foto')) {
                $siswa->foto = $request->file('foto')->storeAs('siswa', $request->file('foto')->getClientOriginalName(), 'public');
            }

            $siswa->save();

            $siswaLogin = new SiswaLogin($request->only([
                'nisn',
            ]));

            $siswaLogin->password = bcrypt($request->password);

            $siswaLogin->save();

            DB::commit();
            Toast::title('Sukses!')
                ->success()
                ->rightTop()
                ->autoDismiss(5)
                ->message('Siswa Berhasil Ditambahkan!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toast::title('Terjadi Kesalahan!')
                ->danger()
                ->rightTop()
                ->autoDismiss(5)
                ->message('Gagal Menambahkan Siswa! ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::with('kelas', 'presensi', 'siswaLogin')->find($id);

        return view('auth.admin.siswa.pages.show', [
            'title' => 'Lihat Siswa',
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::with('kelas', 'presensi', 'siswaLogin')->find($id);
        $kelas = Kelas::all(['id', 'nama_kelas']);
        $jk = [
            ['nama' => 'Laki-Laki', 'value' => 'Laki-Laki'],
            ['nama' => 'Perempuan', 'value' => 'Perempuan'],
        ];

        return view('auth.admin.siswa.pages.edit', [
            'title' => 'Edit Siswa',
            'siswa' => $siswa,
            'kelas' => $kelas,
            'jk' => $jk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nisn)
    {
        $messages = [
            'nisn.required' => 'NISN harus diisi.',
            'nisn.unique' => 'NISN sudah terdaftar, gunakan NISN yang lain.',
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin yang dipilih tidak valid.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar, gunakan email yang lain.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus minimal 8 karakter.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus memiliki format jpeg, png, jpg, gif, atau svg.',
            'foto.max' => 'Foto tidak boleh lebih dari 2MB.',
            'kelas_id.required' => 'Kelas harus dipilih.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
        ];

        $validator = Validator::make($request->all(), [
            'nisn' => 'required|unique:siswas,nisn,' . $nisn . ',nisn',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email|unique:siswas,email,' . $nisn . ',nisn',
            'no_telp' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|min:8',
            'kelas_id' => 'required|exists:kelas,id',
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = implode("\n", $errors);

            Toast::title('Error!')
                ->danger()
                ->rightTop()
                ->autoDismiss(5)
                ->message($errorMessage);
            return redirect()->back()->withInput();
        }

        try {
            DB::beginTransaction();

            $siswa = Siswa::where('nisn', $nisn)->firstOrFail();
            $siswa->update($request->only([
                'nisn',
                'nama_lengkap',
                'jenis_kelamin',
                'tanggal_lahir',
                'alamat',
                'email',
                'no_telp',
                'foto',
                'kelas_id',
            ]));

            if ($request->hasFile('foto')) {
                $siswa->update([
                    'foto' => $request->file('foto')->storeAs('siswa', $request->file('foto')->getClientOriginalName(), 'public'),
                ]);
            }

            if ($request->password) {
                $siswaLogin = SiswaLogin::where('nisn', $siswa->nisn)->first();
                $siswaLogin->update([
                    'password' => bcrypt($request->password),
                ]);
            }

            DB::commit();
            Toast::title('Sukses!')->success()->autoDismiss(5)
                ->rightTop()->message('Siswa Berhasil Diubah!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toast::title('Error!')->success()->autoDismiss(5)
                ->rightTop()->message('Gagal Mengubah Siswa!' . $e->getMessage());
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

            $siswa = Siswa::find($id);
            $siswa->delete();

            DB::commit();
            Toast::title('Sukses!')->success()->rightTop()->autoDismiss(5)->message('Siswa Berhasil Dihapus!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toast::title('Error!')->danger()->rightTop()->autoDismiss(5)->message('Gagal Menghapus Siswa!' . $e->getMessage());
            return redirect()->back();
        }
    }
}
