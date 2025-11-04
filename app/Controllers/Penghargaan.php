<?php

namespace App\Controllers;

class Penghargaan extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        // Dummy penghargaan
        $awards = [
            ['title' => 'Juara Quiz Bulanan', 'date' => '2025-11-01'],
            ['title' => 'Forum Teraktif', 'date' => '2025-10-25'],
        ];

        return view('penghargaan_index', ['awards' => $awards]);
    }
}
