<?php

namespace App\Controllers;

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
    public function cari()
{
    $keyword = $this->request->getGet('keyword');

    $mapel = $this->materiModel
        // PERBAIKAN DI SINI: Tambahkan materi.isi_materi dan materi.id
        ->select('materi.id, materi.judul_materi, materi.isi_materi, materi.pengajar, kategori_mapel.nama_kategori') 
        ->join('kategori_mapel', 'kategori_mapel.id = materi.id_kategori')
        ->like('materi.judul_materi', $keyword)
        ->orLike('materi.isi_materi', $keyword)
        ->orLike('kategori_mapel.nama_kategori', $keyword)
        ->findAll();

    return view('dashboard/penerima/hasil_cari', [
        'keyword' => $keyword,
        'mapel'   => $mapel
    ]);
}
    }
