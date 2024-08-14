<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        return view('auth.admin.pages.tentang', [
            'title' => 'Tentang',
        ]);
    }
}
