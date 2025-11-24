<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar_forum';
    protected $primaryKey = 'id';
    protected $allowedFields = ['forum_id', 'user_id', 'isi', 'tanggal'];
    protected $returnType = 'array';
}
