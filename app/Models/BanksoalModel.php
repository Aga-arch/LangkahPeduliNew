<?php

namespace App\Models;

use CodeIgniter\Model;

class BanksoalModel extends Model
{
    protected $table = 'banksoal';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_pengajar',
        'type_soal',
        'pertanyaan',
        'opsi',
        'jawaban',
        'tingkat_kesulitan'
    ];
}
