<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quiz';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'mapel_id', 'judul_quiz', 'deskripsi_quiz', 'jumlah_soal', 'tingkat_kesulitan', 'created_at'
    ];

    /**
     * Ambil semua quiz berdasarkan ID mata pelajaran
     */
    public function getQuizByMapel($mapelId)
    {
        return $this->where('mapel_id', $mapelId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}
