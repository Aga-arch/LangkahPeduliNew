<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penghargaan extends BaseController
{
    public function index()
    {
        // Contoh data dummy, nanti bisa diganti ambil dari database
        $data['awards'] = [
            [
                'nama' => 'Mentor Terbaik Bulan Mei',
                'tanggal' => '2025-05-28',
                'keterangan' => 'Diberikan atas dedikasi dan pengajaran yang luar biasa'
            ],
            [
                'nama' => 'Kontributor Aktif Forum',
                'tanggal' => '2025-06-10',
                'keterangan' => 'Partisipasi aktif dalam membantu peserta lain di forum'
            ]
        ];

        return view('dashboard/penghargaan', $data);
    }
}
