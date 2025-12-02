<?php

namespace App\Models;

use CodeIgniter\Model;

class MataPelajaranModel extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_kategori', 'judul_materi', 'isi_materi','file', 'pengajar', 'created_at'];
}
