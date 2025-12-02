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

        $this->cekRewardForum($userId);

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

    public function joinForum($forumId)
{
    $userId = session()->get('id');

    // simpan join
    $joinModel = new ForumJoinModel();
    $joinModel->insert([
        'id_user' => $userId,
        'id_forum' => $forumId
    ]);

    // Cek penghargaan
    $this->cekRewardForum($userId);

    return redirect()->back()->with('success', 'Berhasil bergabung ke forum');
}

private function cekRewardForum($userId)
{
    helper('reward');

    $komentarModel = new KomentarModel();
    $joinModel = new ForumJoinModel();

    $jumlahKomentar = $komentarModel->where('id_user', $userId)->countAllResults();
    $jumlahJoin = $joinModel->where('id_user', $userId)->countAllResults();

    $aktivitas = $jumlahKomentar + $jumlahJoin;

    // 1 forum
    if ($jumlahJoin >= 1) beriPenghargaan($userId, 1); // Forum Explorer

    // 5 forum
    if ($jumlahJoin >= 5) beriPenghargaan($userId, 2); // Forum Enthusiast

    // 3 komentar
    if ($jumlahKomentar >= 3) beriPenghargaan($userId, 3); // Commentator

    // 10 komentar
    if ($jumlahKomentar >= 10) beriPenghargaan($userId, 4); // Active Contributor

    // total aktivitas >= 15
    if ($aktivitas >= 15) beriPenghargaan($userId, 5); // Community Builder
}

}