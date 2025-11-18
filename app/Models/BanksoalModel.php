<?php

namespace App\Models;

use CodeIgniter\Model;

class BanksoalModel extends Model
{
    protected $table = 'banksoal';
    protected $primaryKey = 'id_banksoal';

    protected $allowedFields = [
        'nama_banksoal',
        'id_pengajar',
        'topik_pembelajaran',
        'mata_pelajaran'
    ];
}
