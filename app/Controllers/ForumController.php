<?php

namespace App\Controllers;

use App\Models\ForumModel;
use App\Models\UserModel;

class ForumController extends BaseController
{
    // 1. TAMPILKAN DAFTAR FORUM
    public function kelolaForum()
    {
        $forumModel = new ForumModel();
        // Mengambil data urut dari yang terbaru
        $data['forums'] = $forumModel->orderBy('tanggal', 'DESC')->findAll();
        
        return view('dashboard/admin/kelola_forum', $data);
    }

    // 2. TAMPILKAN FORM TAMBAH
    public function tambahForum()
    {
        return view('dashboard/admin/tambah_forum');
    }

    // 3. PROSES SIMPAN BARU
    public function simpanForum()
    {
        $forumModel = new ForumModel();

        // Siapkan data dasar
        $data = [
            'judul'       => $this->request->getPost('judul'),
            'konten'      => $this->request->getPost('konten'), // Pastikan nama kolom di DB 'konten' atau 'deskripsi'
            'status'      => $this->request->getPost('status'),
            'dibuat_oleh' => session()->get('id'), // ID Admin yang login
            'tanggal'     => date('Y-m-d H:i:s'),
            'gambar'      => null // Default null jika tidak ada gambar
        ];

        // Proses Upload Gambar
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/forum', $newName);
            $data['gambar'] = $newName;
        }

        $forumModel->insert($data);

        // Redirect ke halaman Admin (BUKAN Dashboard User)
        return redirect()->to(base_url('dashboard/admin/kelola-forum'))
                         ->with('success', 'Forum berhasil dibuat.');
    }

    // 4. TAMPILKAN FORM EDIT
    public function editForum($id)
    {
        $forumModel = new ForumModel();
        $data['forum'] = $forumModel->find($id);

        if (!$data['forum']) {
            return redirect()->to(base_url('dashboard/admin/kelola-forum'))->with('error', 'Forum tidak ditemukan.');
        }

        return view('dashboard/admin/edit_forum', $data);
    }

    // 5. PROSES UPDATE (PERBAIKAN UTAMA DISINI)
    public function updateForum($id)
    {
        $forumModel = new ForumModel();
        
        // Ambil data lama untuk pengecekan gambar nanti
        $forumLama = $forumModel->find($id);

        // Data yang akan diupdate
        $data = [
            'judul'  => $this->request->getPost('judul'),
            'konten' => $this->request->getPost('konten'),
            'status' => $this->request->getPost('status')
        ];

        // Cek apakah ada gambar baru diupload
        $file = $this->request->getFile('gambar');
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // 1. Generate nama baru & pindahkan file
            $newName = $file->getRandomName();
            $file->move('uploads/forum', $newName);
            
            // 2. Masukkan nama baru ke array data
            $data['gambar'] = $newName;

            // 3. HAPUS GAMBAR LAMA (Agar server tidak penuh)
            // Cek apakah gambar lama ada filenya dan bukan default
            if ($forumLama['gambar'] && file_exists('uploads/forum/' . $forumLama['gambar'])) {
                unlink('uploads/forum/' . $forumLama['gambar']);
            }
        }

        // Update Database
        $forumModel->update($id, $data);

        // REDIRECT KHUSUS KE ADMIN KELOLA FORUM
        return redirect()->to(base_url('dashboard/admin/kelola-forum'))
                         ->with('success', 'Forum berhasil diperbarui.');
    }

    // 6. PROSES HAPUS
    public function hapusForum($id)
    {
        $forumModel = new ForumModel();
        
        // Ambil data dulu untuk hapus gambarnya
        $forum = $forumModel->find($id);

        // Hapus file gambar dari folder jika ada
        if ($forum['gambar'] && file_exists('uploads/forum/' . $forum['gambar'])) {
            unlink('uploads/forum/' . $forum['gambar']);
        }

        // Hapus dari database
        $forumModel->delete($id);

        return redirect()->to(base_url('dashboard/admin/kelola-forum'))
                         ->with('success', 'Forum berhasil dihapus.');
    }
}