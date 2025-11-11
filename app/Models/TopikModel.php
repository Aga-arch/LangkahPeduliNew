<?php

namespace App\Models;

use CodeIgniter\Model;

class TopikModel extends Model
{
    protected $table = 'topik_pembelajaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mapel_id', 'judul_topik', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'created_at'];

    public function getTopikByMapel($mapelId)
    {
        return $this->where('mapel_id', $mapelId)
                    ->orderBy('tanggal_mulai', 'ASC')
                    ->findAll();
    }
}
