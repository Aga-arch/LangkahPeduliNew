<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard/index', $data);
    }

    public function penghargaan()
    {
        return view('dashboard/penghargaan');
    }

    public function quiz()
    {
        return view('dashboard/quiz');
    }

    public function forum()
    {
        return view('dashboard/forum');
    }

    public function materi()
    {
        return view('dashboard/materi');
    }
}
