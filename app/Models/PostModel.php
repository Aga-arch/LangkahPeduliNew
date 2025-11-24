<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['forum_id', 'user_id', 'username', 'title', 'content', 'created_at'];
    protected $useTimestamps = false; // jangan pakai updated_at otomatis
}
