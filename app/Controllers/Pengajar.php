<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QuizModel;
use App\Models\QuizDetailModel;
use App\Models\BankSoalModel;
use App\Models\SoalModel;

class Pengajar extends BaseController
{
    // =========================
    // LIST QUIZ
    // =========================
    public function quiz()
    {
        $quizModel = new QuizModel();
        $data['quiz'] = $quizModel->getQuizWithBank(); // INI yang bikin nama_banksoal tidak ada

return view('dashboard/pengajar/quiz', $data);
    }

    // =========================
    // FORM TAMBAH QUIZ
    // =========================
    public function tambah_quiz()
    {
        $bankModel = new BankSoalModel();
        $data['banksoal'] = $bankModel->findAll();

        return view('dashboard/pengajar/tambah_quiz', $data);
    }

    // =========================
    // AMBIL SOAL VIA AJAX
    // =========================
    public function getSoal($id_banksoal)
    {
        $soalModel = new SoalModel();
        $soal = $soalModel->where('id_banksoal', $id_banksoal)->findAll();

        return $this->response->setJSON($soal);
    }

    // =========================
    // SIMPAN QUIZ
    // =========================
    public function simpan_quiz()
    {
        $quizModel = new QuizModel();
        $quizDetailModel = new QuizDetailModel();

        $judul = $this->request->getPost('judul_quiz');
        $deskripsi = $this->request->getPost('deskripsi');
        $soalTerpilih = $this->request->getPost('soal_terpilih'); // array id_soal

        if (!$judul || !$soalTerpilih) {
            return redirect()->back()->with('error', 'Judul quiz dan soal wajib diisi');
        }

        // Simpan ke tabel quiz
        $quizModel->insert([
            'judul_quiz' => $judul,
            'deskripsi' => $deskripsi,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $id_quiz = $quizModel->getInsertID();

        // Simpan semua soal ke quiz_detail
        foreach ($soalTerpilih as $id_soal) {
            $quizDetailModel->insert([
                'id_quiz' => $id_quiz,
                'id_soal' => $id_soal
            ]);
        }

        return redirect()->to('/dashboard/pengajar/quiz')->with('success', 'Quiz berhasil ditambahkan');
    }

    // =========================
    // HAPUS QUIZ
    // =========================
    public function quizHapus($id)
    {
        $quizModel = new QuizModel();
        $quizDetailModel = new QuizDetailModel();

        // Hapus semua soal di quiz_detail
        $quizDetailModel->where('id_quiz', $id)->delete();

        // Hapus quiz
        $quizModel->delete($id);

        return redirect()->to('/dashboard/pengajar/quiz')->with('success', 'Quiz berhasil dihapus!');
    }

   public function quizDetail($id)
{
    $quizModel = new QuizModel();
    $detailModel = new QuizDetailModel();
    $soalModel = new SoalModel();

    // Ambil data quiz
    $quiz = $quizModel->find($id);

    // Ambil soal yang digunakan
    $detail = $detailModel->where('id_quiz', $id)->findAll();
    $idSoal = array_column($detail, 'id_soal');

    $soal = [];
    if (!empty($idSoal)) {
        $soal = $soalModel->whereIn('id_soal', $idSoal)->findAll();
    }

    return view('dashboard/pengajar/quiz_detail', [
        'quiz' => $quiz,
        'soal' => $soal
    ]);
}


    // =========================
    // FORM EDIT QUIZ (opsional)
    // =========================
 public function quizEdit($id)
{
    $quizModel = new QuizModel();
    $quiz = $quizModel->find($id);

    if (!$quiz) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Quiz tidak ditemukan');
    }

    return view('dashboard/pengajar/quiz_edit', ['quiz' => $quiz]);
}


    public function quizUpdate($id)
{
    $quizModel = new QuizModel();

    $data = [
        'judul_quiz' => $this->request->getPost('judul_quiz'),
        'deskripsi'  => $this->request->getPost('deskripsi'),
        'waktu_menit' => $this->request->getPost('waktu_menit')
    ];

    $quizModel->update($id, $data);

    return redirect()->to(base_url('dashboard/pengajar/quiz'))->with('success', 'Quiz berhasil diperbarui!');
}

}
