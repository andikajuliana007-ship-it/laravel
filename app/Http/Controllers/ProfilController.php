<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $nama = 'Andika Satria Juliana';
        $nim = 'D112421076';

        return view('profil', compact('nama', 'nim'));
    }

    public function formSapa()
    {
        return view('sapa');
    }

    public function prosesSapa(Request $request)
    {
        $nama = $request->input('nama');

        return "Halo, $nama! Selamat datang di Laravel.";
    }
}
