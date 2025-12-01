<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizDetailModel extends Model
{
 protected $table = 'quiz_detail';
protected $primaryKey = 'id_quiz_detail';
protected $allowedFields = ['id_quiz', 'id_soal'];



    public $useTimestamps = false;
}
