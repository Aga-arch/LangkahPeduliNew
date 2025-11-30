<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class Materi extends BaseController
{
    protected $materiModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
        $this->kategoriModel = new KategoriModel();
    }

    // Daftar materi milik pengajar
    public function index()
    {
        $pengajar = session()->get('username');

        $data = [
            'materi' => $this->materiModel->getMateriByPengajar($pengajar),
            'username' => $pengajar
        ];

        return view('dashboard/pengajar/materi', $data);
    }

    // Form tambah materi
    public function tambah()
    {
        $data = [
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('dashboard/pengajar/tambah_materi', $data);
    }

    // Simpan materi baru
    public function simpan()
    {
        $data = [
            'id_kategori' => $this->request->getPost('id_kategori'),
            'judul_materi' => $this->request->getPost('judul_materi'),
            'isi_materi' => $this->request->getPost('isi_materi'),
            'pengajar' => session()->get('username'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->materiModel->insert($data);

        return redirect()->to('/dashboard/pengajar/materi')->with('success', 'Materi berhasil ditambahkan!');
    }

    // Form edit materi
    public function edit($id)
    {
        $materi = $this->materiModel->find($id);
        $pengajar = session()->get('username');

        if (!$materi || $materi['pengajar'] != $pengajar) {
            return redirect()->to('/dashboard/pengajar/materi')->with('error', 'Tidak diizinkan mengubah materi ini.');
        }

        $data = [
            'materi' => $materi,
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('dashboard/pengajar/edit_materi', $data);
    }

    // Update materi
    public function update($id)
    {
        $materi = $this->materiModel->find($id);
        $pengajar = session()->get('username');

        if (!$materi || $materi['pengajar'] != $pengajar) {
            return redirect()->to('/dashboard/pengajar/materi')->with('error', 'Tidak diizinkan mengubah materi ini.');
        }

        $data = [
            'id_kategori' => $this->request->getPost('id_kategori'),
            'judul_materi' => $this->request->getPost('judul_materi'),
            'isi_materi' => $this->request->getPost('isi_materi')
        ];

        $this->materiModel->update($id, $data);

        return redirect()->to('/dashboard/pengajar/materi')->with('success', 'Materi berhasil diperbarui!');
    }

    // Hapus materi
    public function hapus($id)
    {
        $materi = $this->materiModel->find($id);
        $pengajar = session()->get('username');

        if (!$materi || $materi['pengajar'] != $pengajar) {
            return redirect()->to('/dashboard/pengajar/materi')->with('error', 'Tidak diizinkan menghapus materi ini.');
        }

        $this->materiModel->delete($id);

        return redirect()->to('/dashboard/pengajar/materi')->with('success', 'Materi berhasil dihapus!');
    }
    
}
