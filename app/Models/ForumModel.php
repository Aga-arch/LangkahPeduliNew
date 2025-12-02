<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
    protected $table = 'forum';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'konten',
        'tanggal',
        'dibuat_oleh',
        'status',
        'jumlah_reply',   // ← WAJIB tambahkan ini!
        'gambar'
    ];

    protected $returnType = 'array';

    public function getForumTerbaru()
    {
        return $this->orderBy('tanggal', 'DESC')->findAll();
    }

    public function cariForum($keyword)
    {
        return $this->like('judul', $keyword)
                    ->orLike('konten', $keyword)
                    ->findAll();
    }
}
