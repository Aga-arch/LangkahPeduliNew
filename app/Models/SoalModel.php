<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal';
    protected $primaryKey = 'id_soal';

    protected $allowedFields = [
        'id_banksoal',
        'isi_soal',
        'opsi1',
        'opsi2',
        'opsi3',
        'opsi4',
        'jawaban',
        'created_at'
    ];
}
