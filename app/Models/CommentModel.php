<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['post_id', 'user_id', 'username', 'content', 'created_at'];
    protected $useTimestamps = false; // jangan pakai updated_at otomatis
}
