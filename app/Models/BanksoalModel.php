<?php

namespace App\Models;

use CodeIgniter\Model;

class BanksoalModel extends Model
{
    protected $table      = 'banksoal';
    protected $primaryKey = 'id_banksoal';
    protected $useTimestamps = true; // otomatis handle created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Kolom yang boleh di-insert / update
    protected $allowedFields = [
        'nama_banksoal',
        'id_pengajar',
        'topik_pembelajaran',
        'mata_pelajaran'
    ];
}
