<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $riwayat = session('riwayat_nilai', []);

        return view('nilai.input', compact('riwayat'));
    }

    public function hitung(Request $request)
    {
        $nama = $request->input('nama');
        $nilai_uts = (float) $request->input('uts');
        $nilai_uas = (float) $request->input('uas');
        $nilai_tugas = (float) $request->input('tugas');
        $kehadiran = (float) $request->input('kehadiran');

        // Konversi kehadiran (0-18 pertemuan) ke skala 0-100
        $nilai_hadir = ($kehadiran / 18) * 100;

        // Bobot: UTS 30% + UAS 40% + Tugas 20% + Kehadiran 10%
        $nilai_akhir = ($nilai_uts * 0.3)
            + ($nilai_uas * 0.4)
            + ($nilai_tugas * 0.2)
            + ($nilai_hadir * 0.1);

        $status = $nilai_akhir >= 60 ? 'Lulus' : 'Tidak Lulus';

        $riwayat = session('riwayat_nilai', []);

        $riwayat[] = [
            'nama' => $nama,
            'kehadiran' => $kehadiran,
            'nilai_akhir' => round($nilai_akhir, 2),
            'status' => $status,
        ];

        session(['riwayat_nilai' => $riwayat]);

        session()->flash('pesan', "Nilai untuk $nama berhasil dihitung!");

        return redirect('/nilai');
    }
}
