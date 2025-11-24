<?php
namespace App\Models;

use CodeIgniter\Model;

class ForumsModel extends Model
{
    protected $table = 'forums';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'logo'];
}
