<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KategoriModel;
use App\Models\MateriModel;
use App\Models\QuizModel;
use App\Models\TopikModel;

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

        $data = [
            'title'    => 'Dashboard Penerima',
            'username' => session()->get('username')
        ];

        return view('dashboard/penerima/index', $data);
    }

    // ============================================================
    // 📚 DAFTAR MAPEL (KATEGORI)
    // ============================================================
    public function daftarMapel()
    {
        if (!$this->isAuthorized('penerima')) {
            return $this->accessDenied();
        }

        $kategoriModel = new KategoriModel();

        $data = [
            'title'    => 'Daftar Mata Pelajaran',
            'username' => session()->get('username'),
            'mapel'    => $kategoriModel->orderBy('id', 'ASC')->findAll()
        ];

        return view('dashboard/penerima/daftar_mapel', $data);
    }

    // ============================================================
    // 🔍 FITUR PENCARIAN MAPEL
    // ============================================================
    public function cariMateri()
    {
        if (!$this->isAuthorized('penerima')) {
            return $this->accessDenied();
        }

        $keyword = $this->request->getGet('keyword');
        $kategoriModel = new KategoriModel();

        $result = $kategoriModel
            ->like('nama_kategori', $keyword)
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
    // 📖 DETAIL MAPEL (LIST MATERI DALAM KATEGORI)
    // ============================================================
    public function detailMapel($id)
    {
        if (!$this->isAuthorized('penerima')) {
            return $this->accessDenied();
        }

        $kategoriModel = new KategoriModel();
        $materiModel   = new MateriModel();

        $mapel = $kategoriModel->find($id);

        if (!$mapel) {
            return redirect()->to(base_url('dashboard/penerima/mapel'))
                ->with('error', 'Mata pelajaran tidak ditemukan.');
        }

        // Ambil materi berdasarkan kategori
        $materiList = $materiModel->where('id_kategori', $id)->findAll();

        $data = [
            'title'     => 'Detail Mata Pelajaran',
            'username'  => session()->get('username'),
            'mapel'     => $mapel,
            'materiList'=> $materiList
        ];

        return view('dashboard/penerima/detail_mapel', $data);
    }
    public function detailMateri($id)
{
    if (!$this->isAuthorized('penerima')) {
        return $this->accessDenied();
    }

    $materiModel = new \App\Models\MateriModel();

    $materi = $materiModel->find($id);

    if (!$materi) {
        return redirect()->to(base_url('dashboard/penerima'))
            ->with('error', 'Materi tidak ditemukan.');
    }

    $data = [
        'title'    => 'Detail Materi',
        'username' => session()->get('username'),
        'materi'   => $materi
    ];

    return view('dashboard/penerima/detail_materi', $data);
}

public function daftarQuizPenerima()
{
    $quizModel = new \App\Models\QuizModel();
    $data['quiz'] = $quizModel->getQuizWithBank();

    return view('dashboard/penerima/quiz_list', $data);
}

public function detailQuizPenerima($id)
{
    $quizModel = new \App\Models\QuizModel();
    $quiz = $quizModel->find($id);

    if (!$quiz) {
        return redirect()->back()->with('error', 'Quiz tidak ditemukan.');
    }

    return view('dashboard/penerima/quiz_detail', ['quiz' => $quiz]);
}
public function mulaiQuiz($id)
{
    $quizModel = new \App\Models\QuizModel();
    $quiz = $quizModel->find($id);

    if (!$quiz) {
        return redirect()->to('dashboard/penerima/quiz')->with('error', 'Quiz tidak ditemukan.');
    }

    // Ambil soal berdasarkan quiz_detail
    $db = db_connect();
    $soal = $db->table('quiz_detail')
        ->select('soal.*')
        ->join('soal', 'soal.id_soal = quiz_detail.id_soal')
        ->where('quiz_detail.id_quiz', $id)
        ->get()
        ->getResultArray();

    return view('dashboard/penerima/quiz_mulai', [
        'quiz' => $quiz,
        'soal' => $soal
    ]);
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
}
