<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pengajar extends BaseController
{
    public function quiz()
    {
        // 🔹 kirim ke view dashboard/pengajar/quiz.php
        $data['title'] = 'Kelola Quiz';
        return view('dashboard/pengajar/quiz', $data);
    }
 
    public function banksoal()
    {
        return view('dashboard/pengajar/banksoal');
    }
}


