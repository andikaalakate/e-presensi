<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginAdmin()
    {
        return view('auth.pages.login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            Toast::title('Sukses!')
                ->success()
                ->rightTop()
                ->autoDismiss(5)
                ->message('Kamu berhasil masuk!');
            return redirect()->intended('admin/');
        } else {
            Toast::title('Gagal!')
                ->warning()
                ->rightTop()
                ->autoDismiss(5)
                ->message('Email / Password Salah!');
            return redirect()->intended('admin/login');
        }
    }

    /**
     * Log the user out of the application.
     */
    public function adminLogout(Request $request): RedirectResponse
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Toast::title('Sukses!')
                ->success()
                ->rightTop()
                ->autoDismiss(5)
                ->message('Kamu berhasil keluar!');
        }

        return redirect()->intended('admin/login');
    }

    /**
     * Display a listing of the resource.
     */
    public function loginSiswa()
    {
        return view('auth.pages.login-siswa');
    }

    public function siswaLogin(Request $request)
    {
        $credentials = $request->validate([
            'nisn' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            Toast::title('Sukses!')
                ->success()
                ->rightTop()
                ->autoDismiss(5)
                ->message('Kamu berhasil masuk!');
            return redirect()->intended('siswa/');
        } else {
            Toast::title('Gagal!')
                ->warning()
                ->rightTop()
                ->autoDismiss(5)
                ->message('NISN / Password Salah!');
            return redirect()->intended('siswa/login');
        }
    }

    /**
     * Log the user out of the application.
     */
    public function siswaLogout(Request $request): RedirectResponse
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Toast::title('Sukses!')
                ->success()
                ->rightTop()
                ->autoDismiss(5)
                ->message('Kamu berhasil keluar!');
        }

        return redirect()->intended('siswa/login');
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
