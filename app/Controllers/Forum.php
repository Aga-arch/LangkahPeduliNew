<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Forum extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        // Dummy data daftar topik forum
        $topics = [
            ['id' => 1, 'judul' => 'Cara meningkatkan skor quiz', 'penulis' => 'Rina', 'tanggal' => '2025-11-01'],
            ['id' => 2, 'judul' => 'Pengalaman ikut event Langkah Peduli', 'penulis' => 'Budi', 'tanggal' => '2025-10-28'],
            ['id' => 3, 'judul' => 'Saran fitur baru di aplikasi', 'penulis' => 'Andi', 'tanggal' => '2025-10-20'],
        ];

        return view('dashboard/forum', ['topics' => $topics]);
    }

    public function topic($id)
    {
        // Dummy data untuk satu topik
        $topic = [
            'judul' => "Topik Forum #$id",
            'isi' => 'Diskusi ini masih kosong. Silakan tambahkan komentar pertama kamu!',
            'id' => $id
        ];

        return view('dashboard/forum_topic', ['topic' => $topic]);
    }

    public function addComment()
    {
        $comment = $this->request->getPost('comment');
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
