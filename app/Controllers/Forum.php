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

        $data['forum'] = $forumModel->find($id);

        if (!$data['forum'] || $data['forum']['status'] != 'aktif') {
            return redirect()->to(base_url('dashboard/forum'))
                            ->with('error', 'Forum tidak ditemukan atau telah ditutup.');
        }

        $data['komentar'] = $komentarModel
            ->where('forum_id', $id)
            ->orderBy('tanggal', 'ASC')
            ->findAll();

        return view('dashboard/forum/detail', $data);
    }

    public function tambahKomentar($id)
    {
        if (!$this->request->getPost('isi')) {
            return redirect()->back()->with('error', 'Komentar tidak boleh kosong');
        }

        $komentarModel = new KomentarModel();
        $komentarModel->insert([
            'forum_id' => $id,
            'user_id'  => session()->get('id'),
            'isi'      => $this->request->getPost('isi'),
            'tanggal'  => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}