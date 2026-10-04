<?php

namespace App\Http\Controllers;

class TentangController extends Controller
{
    public function index()
    {
        $nama = 'Andika Satria Juliana';
        $nim = 'D112421076';
        $kelas = 'Isi kelas kamu';
        $minat = 'Isi hobi/minat singkat kamu';

        return view('tentang', compact('nama', 'nim', 'kelas', 'minat'));
    }
}
