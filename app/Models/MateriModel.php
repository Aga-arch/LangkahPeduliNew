<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_kategori',
        'judul_materi',
        'isi_materi',
        'file',
        'pengajar',
        'created_at'
    ];

    protected $useTimestamps = false;

    // Ambil semua materi + nama kategori
    public function getMateriWithKategori()
    {
        return $this->select('materi.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.id = materi.id_kategori')
                    ->orderBy('materi.id', 'DESC')
                    ->findAll();
    }

    // Ambil materi milik pengajar tertentu
    public function getMateriByPengajar($pengajar)
    {
        return $this->select('materi.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.id = materi.id_kategori')
                    ->where('materi.pengajar', $pengajar)
                    ->orderBy('materi.id', 'DESC')
                    ->findAll();
    }
}
