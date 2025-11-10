<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MataPelajaranModel;

class Dashboard extends BaseController
{
    /**
     * 🏠 Halaman Dashboard Utama
     * Mengecek login & mengarahkan user berdasarkan role.
     */
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $role = session()->get('role');

        switch ($role) {
            case 'admin':
                return redirect()->to(base_url('dashboard/admin'));
            case 'pengajar':
                return redirect()->to(base_url('dashboard/pengajar'));
            case 'penerima':
                return redirect()->to(base_url('dashboard/penerima'));
            default:
                return redirect()->to(base_url('login'))
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

        return view('dashboard/admin/index', $data);
    }

    // ============================================================
    // 🎓 DASHBOARD PENGAJAR
    // ============================================================
    public function pengajar()
    {
        if (!$this->isAuthorized('pengajar')) {
            return $this->accessDenied();
        }

        $data = [
            'title'    => 'Dashboard Pengajar',
            'username' => session()->get('username')
        ];

        return view('dashboard/pengajar/index', $data);
    }

    public function materi()
    {
        if (!$this->isAuthorized('pengajar')) {
            return $this->accessDenied();
        }

        $data = [
            'title'    => 'Kelola Materi',
            'username' => session()->get('username')
        ];

        return view('dashboard/pengajar/materi', $data);
    }

    public function quizPengajar()
    {
        if (!$this->isAuthorized('pengajar')) {
            return $this->accessDenied();
        }

        $data = [
            'title'    => 'Kelola Quiz',
            'username' => session()->get('username')
        ];

        return view('dashboard/pengajar/quiz', $data);
    }

    public function jadwal()
    {
        if (!$this->isAuthorized('pengajar')) {
            return $this->accessDenied();
        }

        $data = [
            'title'    => 'Kelola Jadwal',
            'username' => session()->get('username')
        ];

        return view('dashboard/pengajar/jadwal', $data);
    }

    // ============================================================
    // 🎁 DASHBOARD PENERIMA
    // ============================================================
    public function penerima()
    {
        if (!$this->isAuthorized('penerima')) {
            return $this->accessDenied();
        }

        $mapelModel = new MataPelajaranModel();

        $data = [
            'title'    => 'Dashboard Penerima',
            'username' => session()->get('username'),
            'mapel'    => $mapelModel->orderBy('id', 'ASC')->findAll()
        ];

        return view('dashboard/penerima/index', $data);
    }

    // ============================================================
    // 🔍 FITUR PENCARIAN MATA PELAJARAN
    // ============================================================
    public function cariMateri()
    {
        if (!$this->isAuthorized('penerima')) {
            return $this->accessDenied();
        }

        $keyword = $this->request->getGet('keyword');
        $mapelModel = new MataPelajaranModel();

        // cari berdasarkan nama_mapel atau pengajar
        $result = $mapelModel
            ->like('nama_mapel', $keyword)
            ->orLike('pengajar', $keyword)
            ->findAll();

        $data = [
            'title'    => 'Hasil Pencarian: ' . esc($keyword),
            'username' => session()->get('username'),
            'keyword'  => $keyword,
            'mapel'    => $result
        ];

        return view('dashboard/penerima/hasil_cari', $data);
    }

    // ============================================================
    // ⚙️ HELPER ROLE
    // ============================================================
    private function isAuthorized(string $requiredRole): bool
    {
        return session()->get('logged_in') && session()->get('role') === $requiredRole;
    }

    private function accessDenied()
    {
        return redirect()->to(base_url('dashboard'))
            ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }

public function detailMapel($id)
{
    if (!$this->isAuthorized('penerima')) {
        return $this->accessDenied();
    }

    $mapelModel = new \App\Models\MataPelajaranModel();
    $quizModel = new \App\Models\QuizModel();

    $mapel = $mapelModel->find($id);

    if (!$mapel) {
        return redirect()->to(base_url('dashboard/penerima'))
            ->with('error', 'Mata pelajaran tidak ditemukan.');
    }

    // ambil quiz sesuai mapel_id
    $quizList = $quizModel->getQuizByMapel($id);

    $data = [
        'title'    => 'Detail Mata Pelajaran',
        'username' => session()->get('username'),
        'mapel'    => $mapel,
        'quizList' => $quizList
    ];

    return view('dashboard/penerima/detail_mapel', $data);
}


}
