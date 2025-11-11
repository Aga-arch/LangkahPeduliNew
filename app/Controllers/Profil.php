<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        $profil = [
            'nama' => session()->get('username') ?? 'Admin',
            'email' => session()->get('email') ?? 'admin@langkahpeduli.com',
            'tanggal_gabung' => '2024-07-01',
            'jam_login_terakhir' => date('H:i:s'),
        ];

        return view('dashboard/profil', ['profil' => $profil]);
    }
}
