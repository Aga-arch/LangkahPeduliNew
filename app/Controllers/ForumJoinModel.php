<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumJoinModel extends Model
{
    protected $table = 'forum_join';
    protected $primaryKey = 'id_join';

    protected $allowedFields = [
        'id_user',
        'id_forum',
        'tanggal_join'
    ];

    protected $useTimestamps = false;
}
