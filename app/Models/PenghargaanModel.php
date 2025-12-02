<?php

namespace App\Models;

use CodeIgniter\Model;

class PenghargaanModel extends Model
{
    protected $table = 'penghargaan';
    protected $primaryKey = 'id_penghargaan';
    protected $allowedFields = ['nama_penghargaan','deskripsi','icon','kategori','created_at'];
}
