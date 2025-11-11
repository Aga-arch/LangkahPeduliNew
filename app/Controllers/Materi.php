<?php

namespace App\Controllers;

use App\Models\MataPelajaranModel;
use CodeIgniter\Controller;

class Materi extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new MataPelajaranModel();
    }

    /**
     * Menampilkan daftar materi sesuai pengajar
     */
   public function index($all = false)
{
    $username = session()->get('username');

    if ($all) {
        // Menampilkan semua materi
        $data['materi'] = $this->model->findAll();
        $data['all'] = true;
    } else {
        // Menampilkan hanya materi milik pengajar
        $data['materi'] = $this->model->where('pengajar', $username)->findAll();
        $data['all'] = false;
    }

    $data['username'] = $username;

    return view('dashboard/pengajar/materi', $data);
}


    /**
     * Halaman tambah materi
     */
    public function tambah()
    {
        return view('dashboard/pengajar/tambah_materi');
    }

    /**
     * Simpan data materi baru
     */
    public function simpan()
    {
        $username = session()->get('username');

        $data = [
            'kode_mapel' => $this->request->getPost('kode_mapel'),
            'nama_mapel' => $this->request->getPost('nama_mapel'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'pengajar'   => $username,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->model->insert($data);

        return redirect()->to('/dashboard/pengajar/materi')->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Halaman edit materi (hanya pemilik)
     */
    public function edit($id)
    {
        $materi = $this->model->find($id);
        $username = session()->get('username');

        if (!$materi || $materi['pengajar'] != $username) {
            return redirect()->to('/dashboard/pengajar/materi')->with('error', 'Tidak diizinkan mengubah materi ini.');
        }

    return view('dashboard/pengajar/edit_materi', ['materi' => $materi]);
    }

    /**
     * Update materi (hanya pemilik)
     */
    public function update($id)
    {
        $materi = $this->model->find($id);
        $username = session()->get('username');

        if (!$materi || $materi['pengajar'] != $username) {
            return redirect()->to('/dashboard/pengajar/materi')->with('error', 'Tidak diizinkan mengubah materi ini.');
        }

        $data = [
            'kode_mapel' => $this->request->getPost('kode_mapel'),
            'nama_mapel' => $this->request->getPost('nama_mapel'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
        ];

        $this->model->update($id, $data);

        return redirect()->to('/dashboard/pengajar/materi')->with('success', 'Materi berhasil diperbarui!');
    }

    /**
     * Hapus materi (hanya pemilik)
     */
   public function hapus($id)
{
    $materi = $this->model->find($id);
    $username = session()->get('username');

    // Cek kepemilikan materi
    if (!$materi || $materi['pengajar'] != $username) {
        return redirect()->to('/dashboard/pengajar/materi')->with('error', 'Tidak diizinkan menghapus materi ini.');
    }

    $this->model->delete($id);

    return redirect()->to('/dashboard/pengajar/materi')->with('success', 'Materi berhasil dihapus!');
}
}