<?php

namespace App\Controllers;

use App\Models\ForumModel;
use App\Models\KomentarModel;

class Forum extends BaseController
{
    public function index()
    {
        $forumModel = new ForumModel();
        $data['forums'] = $forumModel->getForumTerbaru();

        return view('dashboard/penerima/forum/index', $data);
    }

    public function detail($id)
    {
        $forumModel = new ForumModel();
        $komentarModel = new KomentarModel();

        $data['forum'] = $forumModel->find($id);
        $data['komentar'] = $komentarModel
            ->where('forum_id', $id)
            ->orderBy('tanggal', 'ASC')
            ->findAll();

        if (!$data['forum']) {
            return redirect()->to(base_url('dashboard/penerima/forum'))->with('error', 'Forum tidak ditemukan.');
        }

        return view('dashboard/penerima/forum/detail', $data);
    }

    public function tambahKomentar($id)
    {
        if (!$this->request->getPost('isi')) {
            return redirect()->back()->with('error', 'Komentar tidak boleh kosong');
        }

        $komentarModel = new KomentarModel();
        $komentarModel->insert([
            'forum_id' => $id,
            'user_id'  => session()->get('userId'),
            'isi'      => $this->request->getPost('isi'),
            'tanggal'  => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
