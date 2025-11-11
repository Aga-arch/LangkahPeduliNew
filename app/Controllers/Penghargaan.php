<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penghargaan extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = [
            'title' => 'Penghargaan Saya',
            'username' => session()->get('username'),
        ];

        return view('dashboard/penerima/penghargaan', $data);
    }
}
