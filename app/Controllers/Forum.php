<?php

namespace App\Controllers;

class Forum extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('forum_index');
    }

    public function topic($id)
    {
        // Dummy topic
        $topic = "Topik Forum #" . $id;
        return view('forum_topic', ['topic' => $topic]);
    }

    public function addComment()
    {
        $comment = $this->request->getPost('comment');
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
