<?php 

namespace App\Models;

use CodeIgniter\Model;

class BanksoalModel extends Model
{
    protected $table      = 'banksoal';
    protected $primaryKey = 'id_banksoal';
    protected $allowedFields = [
        'nama_banksoal',
        'topik_pembelajaran',
        'mata_pelajaran',
        'id_pengajar',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
}
