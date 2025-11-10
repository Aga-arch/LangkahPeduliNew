<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    /**
     * 🏠 Halaman dashboard utama (menyesuaikan role)
     */
    public function index()
    {
        // 🔐 Cek login
        if (!session()->get('logged_in')) {
            return redirect()
                ->to(base_url('login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // 🔍 Ambil data session
        $username = session()->get('username');
        $role     = session()->get('role');

        // 🧭 Arahkan sesuai role
        switch ($role) {
            case 'admin':
                return redirect()->to(base_url('dashboard/admin'));
            case 'mentor':
                return redirect()->to(base_url('dashboard/mentor'));
            case 'penerima':
                return redirect()->to(base_url('dashboard/penerima'));
            default:
                // Role tidak dikenali
                return view('dashboard/index', ['username' => $username]);
        }
    }

    /**
     * 👑 Dashboard untuk Admin
     */
    public function admin()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()
                ->to(base_url('dashboard'))
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('dashboard/admin', [
            'username' => session()->get('username'),
        ]);
    }

    /**
     * 🎓 Dashboard untuk Mentor
     */
    public function mentor()
    {
        if (session()->get('role') !== 'mentor') {
            return redirect()
                ->to(base_url('dashboard'))
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('dashboard/mentor', [
            'username' => session()->get('username'),
        ]);
    }

    /**
     * 🎁 Dashboard untuk Penerima
     */
    public function penerima()
    {
        if (session()->get('role') !== 'penerima') {
            return redirect()
                ->to(base_url('dashboard'))
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('dashboard/penerima', [
            'username' => session()->get('username'),
        ]);
    }
}
