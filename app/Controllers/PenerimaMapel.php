<?php

namespace App\Controllers;

use App\Models\MataPelajaranModel;
use App\Models\TopikModel;
use App\Models\QuizModel;

class PenerimaMapel extends BaseController
{
    protected $mapel;
    protected $topik;
    protected $quiz;

    public function __construct()
    {
        $this->mapel = new MataPelajaranModel();
        $this->topik = new TopikModel();
    }

    // Halaman daftar mapel
    public function index()
    {
        $data = [
            'mapel' => $this->mapel->findAll(),
            'username' => session()->get('username'),
        ];

        return view('dashboard/penerima/daftarmapel', $data);
    }

    // Halaman detail mapel
    public function detail($id)
    {
        $data['mapel'] = $this->mapel->find($id);
        $data['topikList'] = $this->topik->where('id_kategori', $id)->findAll();

        return view('dashboard/penerima/detailmapel', $data);
    }
}