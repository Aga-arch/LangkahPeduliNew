<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ForumsModel;
use App\Models\PostModel;
use App\Models\CommentModel;

class Posts extends BaseController
{
    protected $forumsModel;
    protected $postModel;
    protected $commentModel;

    public function __construct()
    {
        $this->forumModel = new ForumsModel();
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        helper('form');
    }

    // show posts feed for a forum (optional)
    public function index($forum_id = null)
    {
        $forum = $this->forumsModel->find($forum_id);
        if (!$forum) throw new \CodeIgniter\Exceptions\PageNotFoundException("Forum not found");
        $data['forum'] = $forum;
        $data['posts'] = $this->postModel->where('forum_id',$forum_id)->orderBy('created_at','DESC')->findAll();
        return view('forum/posts_index', $data);
    }

    // show one post + comments
    public function show($post_id = null)
    {
        $post = $this->postModel->find($post_id);
        if (!$post) throw new \CodeIgniter\Exceptions\PageNotFoundException("Post not found");
        $data['post'] = $post;
        $data['comments'] = $this->commentModel->where('post_id',$post_id)->orderBy('created_at','ASC')->findAll();
        return view('forum/post_detail', $data);
    }

    // submit comment (post)
    public function comment()
    {
        if ($this->request->getMethod() !== 'post') return redirect()->back();

        $post_id = (int)$this->request->getPost('post_id');
        $content = trim($this->request->getPost('content'));
        if ($content === '') {
            return redirect()->back()->with('error','Komentar tidak boleh kosong.');
        }

        // session data
        $userId = session()->get('id') ?? 0;
        $username = session()->get('username') ?? 'Anonim';

        // validate post exists
        if (!$this->postModel->find($post_id)) {
            return redirect()->back()->with('error','Posting tidak ditemukan.');
        }

        $this->commentModel->save([
            'post_id' => $post_id,
            'user_id' => $userId,
            'username'=> $username,
            'content' => $content
        ]);

        return redirect()->to('/dashboard/forum/post/'.$post_id)->with('success','Komentar ditambahkan.');
    }
}
