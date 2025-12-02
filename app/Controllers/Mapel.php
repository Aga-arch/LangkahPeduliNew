<?php

namespace App\Controllers\Penerima;

use App\Controllers\BaseController;
use App\Models\MateriModel;
use App\Models\KategoriModel;

class Mapel extends BaseController
{
    protected $materiModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
        $this->kategoriModel = new KategoriModel();
    }

    // Detail mapel + daftar materi
    public function detail($id)
    {
        // Ambil kategori/mapel
        $mapel = $this->kategoriModel->find($id);

        if (!$mapel) {
            return redirect()->back()->with('error', 'Mapel tidak ditemukan.');
        }

        // Ambil materi berdasarkan kategori
        $materi = $this->materiModel
                        ->where('id_kategori', $id)
                        ->orderBy('id', 'DESC')
                        ->findAll();

        $data = [
            'mapel' => $mapel,
            'materi' => $materi
        ];

        return view('dashboard/penerima/detailMapel', $data);
    }
}
