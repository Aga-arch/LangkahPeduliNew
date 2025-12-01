<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SoalModel;
use App\Models\BanksoalModel;
use App\Models\QuizModel;
use App\Models\QuizDetailModel;

class Quiz extends BaseController
{
    public function index()
{
    $quizModel = new QuizModel();
    $data['quiz']  = $quizModel->getQuizWithBank(); // ambil data quiz + bank soal
        return view('dashboard/pengajar/quiz', $data);
}

    public function simpan()
{
    $quizModel   = new QuizModel();
    $detailModel = new QuizDetailModel();

    // Cek dulu data yang dikirim form
    // HAPUS dua baris ini kalau sudah yakin form mengirim data
    // dd($this->request->getPost(), $_SERVER['REQUEST_METHOD']);

    // 1. Data untuk tabel quiz
    $dataQuiz = [
        'judul_quiz' => $this->request->getPost('judul_quiz'),
        'deskripsi'  => $this->request->getPost('deskripsi'),
        'waktu_menit' => $this->request->getPost('waktu_menit'),
        'created_at' => date('Y-m-d H:i:s')
    ];

    // 2. Simpan ke tabel quiz
    if (!$quizModel->insert($dataQuiz)) {
        dd($quizModel->errors());   // kalau ada salah allowedFields / nama kolom
    }

    // 3. Ambil id_quiz terakhir
    $id_quiz = $quizModel->insertID();

    // 4. Ambil soal yang dicentang
    $soalTerpilih = $this->request->getPost('soal_terpilih');

    if (!$soalTerpilih) {
        return redirect()->back()->with('error', 'Pilih minimal 1 soal!');
    }

    // 5. Simpan ke tabel quiz_detail
    foreach ($soalTerpilih as $id_soal) {
        $detailModel->insert([
            'id_quiz' => $id_quiz,
            'id_soal' => $id_soal
        ]);
    }

return redirect()->to('dashboard/pengajar/quiz')->with('success', 'Quiz berhasil dibuat!');
}


    public function getSoal($id_bank)
    {
        $soalModel = new \App\Models\SoalModel();
        $soal = $soalModel->where('id_banksoal', $id_bank)->findAll();
        return $this->response->setJSON($soal);
    }
}
