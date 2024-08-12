<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->intended('admin/');
        } else {
            return redirect()->intended('admin/login')->with('warning', 'Email / Password Salah!');
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
            return redirect()->intended('siswa/');
        } else {
            return redirect()->intended('siswa/login')->with('warning', 'NISN / Password Salah!');
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
