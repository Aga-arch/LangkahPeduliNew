<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    /**
     * 🏠 Halaman Dashboard Utama
     * Mengecek login & mengarahkan user berdasarkan role.
     */
    public function index()
    {
        // 🔒 Pastikan user sudah login
        if (!session()->get('logged_in')) {
            return redirect()
                ->to(base_url('login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil role dari session
        $role = session()->get('role');

        // Arahkan ke dashboard sesuai role
        switch ($role) {
            case 'admin':
                return redirect()->to(base_url('dashboard/admin'));
            case 'mentor':
                return redirect()->to(base_url('dashboard/mentor'));
            case 'penerima':
                return redirect()->to(base_url('dashboard/penerima'));
            default:
                // Jika role tidak dikenali
                return redirect()
                    ->to(base_url('login'))
                    ->with('error', 'Role tidak valid atau belum ditentukan.');
        }
    }

    // ============================================================
    // 👑 DASHBOARD ADMIN
    // ============================================================
    public function admin()
    {
        if (!$this->isAuthorized('admin')) {
            return $this->accessDenied();
        }

        $data = [
            'title'    => 'Dashboard Admin',
            'username' => session()->get('username')
        ];

        return view('dashboard/admin', $data);
    }

    // ============================================================
    // 🎓 DASHBOARD MENTOR
    // ============================================================
    public function mentor()
    {
        if (!$this->isAuthorized('mentor')) {
            return $this->accessDenied();
        }

        $data = [
            'title'    => 'Dashboard Mentor',
            'username' => session()->get('username')
        ];

        return view('dashboard/mentor', $data);
    }

    // ============================================================
    // 🎁 DASHBOARD PENERIMA
    // ============================================================
    public function penerima()
    {
        if (!$this->isAuthorized('penerima')) {
            return $this->accessDenied();
        }

        $data = [
            'title'    => 'Dashboard Penerima',
            'username' => session()->get('username')
        ];

        return view('dashboard/penerima', $data);
    }

    // ============================================================
    // 🔧 Fungsi Bantu (Helper)
    // ============================================================

    /**
     * Cek apakah user memiliki role tertentu
     */
    private function isAuthorized(string $requiredRole): bool
    {
        return session()->get('logged_in') && session()->get('role') === $requiredRole;
    }

    /**
     * Redirect jika akses ditolak
     */
    private function accessDenied()
    {
        return redirect()
            ->to(base_url('dashboard'))
            ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
