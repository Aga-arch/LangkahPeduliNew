<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal';
    protected $primaryKey = 'id_soal';

    protected $allowedFields = [
        'id_banksoal',
        'pertanyaan',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'jawaban',
        'created_at'
    ];
}
