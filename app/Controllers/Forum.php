<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForumsModel;

class Forum extends BaseController
{
    public function index()
{
    $forumModel = new ForumsModel();
    $data['forums'] = $forumModel->findAll();
    return view('forum/index', $data);
}
}
