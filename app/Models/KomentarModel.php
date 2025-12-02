<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'forum_id',
        'user_id',
        'isi',
        'tanggal'
    ];

    protected $returnType = 'array';

    // JOIN ke user
    public function getKomentarByForum($forum_id)
{
    return $this->select('komentar.*, users.username AS name')
                ->join('users', 'users.id = komentar.user_id')
                ->where('forum_id', $forum_id)
                ->orderBy('tanggal', 'ASC')
                ->findAll();
}
}