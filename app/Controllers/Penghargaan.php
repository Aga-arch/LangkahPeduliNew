<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penghargaan extends BaseController
{
    public function index()
    {
        // Cek login (opsional, boleh dihapus kalau belum pakai login)
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        // Data dummy penghargaan
        $awards = [
            [
                'nama' => 'Juara Quiz Bulanan',
                'tanggal' => '2025-11-01',
                'keterangan' => 'Diberikan kepada pengguna dengan skor tertinggi di quiz bulan November.'
            ],
            [
                'nama' => 'Forum Teraktif',
                'tanggal' => '2025-10-25',
                'keterangan' => 'Diberikan kepada pengguna paling aktif berdiskusi di forum komunitas.'
            ]
        ];

        // Arahkan ke view di folder dashboard
        return view('dashboard/penghargaan', ['awards' => $awards]);
    }
}
