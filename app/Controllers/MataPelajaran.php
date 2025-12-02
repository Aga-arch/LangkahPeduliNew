<?php

namespace App\Controllers;

use App\Models\MataPelajaranModel;

class MataPelajaran extends BaseController
{
    protected $mapel;

    public function __construct()
    {
        $this->mapel = new MataPelajaranModel();
    }

    public function create()
    {
        return view('dashboard/pengajar/mata_pelajaran_tambah');
    }

    public function store()
    {
        $prefix = $this->request->getPost('prefix');
        $nama = $this->request->getPost('judul_materi');
        $deskripsi = $this->request->getPost('isi_materi');

        // cek kode urut terakhir berdasarkan prefix
        $last = $this->mapel->getLastUrut($prefix);
        $nextUrut = $last ? $last['kode_urut'] + 1 : 1;

        // buat kode mapel: PREFIX + 3 digit nomor
        $kodeMapel = $prefix . str_pad($nextUrut, 3, '0', STR_PAD_LEFT);

        $this->mapel->insert([
            'prefix'      => $prefix,
            'kode_urut'   => $nextUrut,
            'kode_mapel'  => $kodeMapel,
            'nama_mapel'  => $nama,
            'deskripsi'   => $deskripsi,
            'pengajar'    => session()->get('id_pengajar'),
        ]);

        return redirect()->to('/dashboard/pengajar/mata-pelajaran')
            ->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }
}
