<?php

namespace App\Controllers;

use App\Models\ForumModel;
use App\Models\UserModel;

class ForumController extends BaseController
{
    public function kelolaForum()
    {
        $forumModel = new ForumModel();
        $data['forums'] = $forumModel->orderBy('tanggal', 'DESC')->findAll();
        return view('dashboard/admin/kelola_forum', $data);
    }

    public function tambahForum()
    {
        return view('dashboard/admin/tambah_forum');
    }

    public function simpanForum()
    {
        $forumModel = new ForumModel();

        $data = [
            'judul'      => $this->request->getPost('judul'),
            'konten'     => $this->request->getPost('konten'),
            'status'     => $this->request->getPost('status'),
            'dibuat_oleh'=> session()->get('userId'),
            'tanggal'    => date('Y-m-d H:i:s')
        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/forum', $newName);
            $data['gambar'] = $newName;
        }

        $forumModel->insert($data);
        return redirect()->to(base_url('dashboard/admin/kelola-forum'))->with('success', 'Forum berhasil dibuat');
    }

    public function editForum($id)
    {
        $forumModel = new ForumModel();
        $data['forum'] = $forumModel->find($id);
        return view('dashboard/admin/edit_forum', $data);
    }

    public function updateForum($id)
    {
        $forumModel = new ForumModel();

        $data = [
            'judul'  => $this->request->getPost('judul'),
            'konten' => $this->request->getPost('konten'),
            'status' => $this->request->getPost('status')
        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/forum', $newName);
            $data['gambar'] = $newName;
        }

        $forumModel->update($id, $data);
        return redirect()->to(base_url('dashboard/admin/kelola-forum'))->with('success', 'Forum berhasil diperbarui');
    }

    public function hapusForum($id)
    {
        $forumModel = new ForumModel();
        $forumModel->delete($id);
        return redirect()->to(base_url('dashboard/admin/kelola-forum'))->with('success', 'Forum berhasil dihapus');
    }
}
