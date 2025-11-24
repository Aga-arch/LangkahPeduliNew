<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForumsModel;
use App\Models\PostModel;
use App\Models\CommentModel;

class Forum extends BaseController
{
    // Daftar forum
    public function index()
    {
        $forumModel = new ForumsModel();
        $data['forums'] = $forumModel->findAll();
        return view('forum/index', $data);
    }

    // Room forum
    public function room($forum_id)
    {
        $postModel = new PostModel();
        $data['posts'] = $postModel->where('forum_id', $forum_id)
                                   ->where('username', 'admin') // hanya post admin
                                   ->orderBy('created_at', 'DESC')
                                   ->findAll();
        $data['forum_id'] = $forum_id;
        return view('forum/room', $data);
    }

    // Admin only – tambah post
    public function storePost()
    {
        $session = session();

        if ($session->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $forum_id = $this->request->getPost('forum_id');
        $content = $this->request->getPost('content');

        if (!$forum_id || !$content) {
            return redirect()->back()->with('error', 'Data tidak lengkap');
        }

        $postModel = new PostModel();
        $postModel->save([
            'forum_id'   => $forum_id,
            'content'    => $content,
            'username'   => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/dashboard/forum/room/' . $forum_id);
    }

    // Semua user – tambah komentar
    public function storeComment()
    {
        $session = session();
        $post_id = $this->request->getPost('post_id');
        $content = $this->request->getPost('content');
        $username = $session->get('username');

        if (!$post_id || !$content || !$username) {
            return redirect()->back()->with('error', 'Silakan login dan isi komentar');
        }

        $commentModel = new CommentModel();
        $commentModel->save([
            'post_id'    => $post_id,
            'content'    => $content,
            'username'   => $username,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back();
    }

    public function deleteComment($comment_id)
    {
    $session = session();
    $username = $session->get('username');

    if (!$username) {
        return redirect()->back()->with('error', 'Silakan login terlebih dahulu.');
    }

    $commentModel = new \App\Models\CommentModel();
    $comment = $commentModel->find($comment_id);

    if (!$comment) {
        return redirect()->back()->with('error', 'Komentar tidak ditemukan.');
    }

    // Hanya pemilik komentar yang bisa hapus
    if ($comment['username'] !== $username) {
        return redirect()->back()->with('error', 'Anda tidak berhak menghapus komentar ini.');
    }

    $commentModel->delete($comment_id);

    return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
