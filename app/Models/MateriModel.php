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

    public function getMateriWithKategori() 
    {
        return $this->select('materi.*, kategori_mapel.nama_kategori')
            ->join('kategori_mapel', 'kategori_mapel.id = materi.id_kategori')
            ->orderBy('materi.id', 'DESC')
            ->findAll();
    }

    public function getMateriByPengajar($pengajar) 
    {
        return $this->select('materi.*, kategori_mapel.nama_kategori')
            ->join('kategori_mapel', 'kategori_mapel.id = materi.id_kategori')
            ->where('materi.pengajar', $pengajar)
            ->orderBy('materi.id', 'DESC')
            ->findAll();
    }
}
