<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPenghargaanModel extends Model
{
    protected $table = 'user_penghargaan';
    protected $primaryKey = 'id_user_penghargaan';
    protected $allowedFields = ['id_user','id_penghargaan','tanggal_didapat'];
}
