<?php

namespace App\Controllers;

use App\Models\ForumModel;
use App\Models\KomentarModel;

class Forum extends BaseController
{
    public function index()
    {
        $forumModel = new ForumModel();
        $data['forums'] = $forumModel
            ->where('status', 'aktif')
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        return view('dashboard/forum/index', $data);
    }

    public function detail($id)
    {
        $forumModel = new ForumModel();
        $komentarModel = new KomentarModel();

        $forum = $forumModel->find($id);

        if (!$forum || $forum['status'] !== 'aktif') {
            return redirect()->to('/dashboard/forum')
                             ->with('error', 'Forum tidak ditemukan');
        }

        $data = [
            'forum'    => $forum,
            'komentar' => $komentarModel->getKomentarByForum($id)
        ];

        return view('dashboard/forum/detail', $data);
    }

    public function tambahKomentar($id)
    {
        if (!session()->get('id')) {
            return redirect()->to('/login');
        }

        if (!$this->request->getPost('isi')) {
            return redirect()->back()
                             ->with('error', 'Komentar tidak boleh kosong');
        }

        $komentarModel = new KomentarModel();
        $komentarModel->insert([
            'forum_id' => $id,
            'user_id'  => session()->get('id'),
            'isi'      => $this->request->getPost('isi'),
            'tanggal'  => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()
                         ->with('success', 'Komentar ditambahkan');
    }

    public function hapusKomentar($id)
    {
        $komentarModel = new KomentarModel();
        $komentar = $komentarModel->find($id);

        if (!$komentar) {
            return redirect()->to('/dashboard/forum');
        }

        // ✅ cek hak akses
        if (
            session()->get('role') !== 'admin' &&
            session()->get('id') != $komentar['user_id']
        ) {
            return redirect()->back()
                             ->with('error', 'Tidak punya akses');
        }

        $forum_id = $komentar['forum_id'];
        $komentarModel->delete($id);

        return redirect()->to('/dashboard/forum/detail/' . $forum_id)
                         ->with('success', 'Komentar dihapus');
    }
}