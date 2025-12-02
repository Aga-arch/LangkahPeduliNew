<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quiz';
    protected $primaryKey = 'id_quiz';
    protected $allowedFields = ['judul_quiz', 'deskripsi', 'waktu_menit', 'created_at', 'mapel_id'];

    public $useTimestamps = false;

    // ========================================
    // Ambil quiz beserta bank soalnya
    // ========================================
    public function getQuizWithBank()
    {
        return $this->select('quiz.*, GROUP_CONCAT(DISTINCT banksoal.nama_banksoal SEPARATOR ", ") as nama_banksoal')
            ->join('quiz_detail', 'quiz_detail.id_quiz = quiz.id_quiz', 'left')
            ->join('soal', 'soal.id_soal = quiz_detail.id_soal', 'left')
            ->join('banksoal', 'banksoal.id_banksoal = soal.id_banksoal', 'left')
            ->groupBy('quiz.id_quiz')
            ->findAll();
    }

    // ========================================
    // 🔥 Tambahkan method INI (untuk "Lihat Detail")
    // ========================================
    public function getQuizByMapel($mapel_id)
    {
        return $this->where('id_kategori', $mapel_id)->findAll();
    }

    public function searchQuiz($keyword)
    {
        return $this->like('judul_quiz', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->findAll();
    }
}