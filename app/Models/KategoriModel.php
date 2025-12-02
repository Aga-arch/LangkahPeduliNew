<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_mapel';   // ← WAJIB UBAH INI
    protected $primaryKey = 'id_kategori'; // sesuaikan kalau beda

    protected $allowedFields = ['nama_kategori'];
}
