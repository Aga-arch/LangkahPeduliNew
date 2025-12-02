<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'id_komentar';

    protected $allowedFields = [
        'id_user',
        'id_forum',
        'komentar',
        'tanggal'
    ];

    protected $useTimestamps = false;
}
