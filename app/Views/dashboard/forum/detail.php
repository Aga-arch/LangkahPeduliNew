<?= $this->extend('layout/layout_penerima') ?>
<?= $this->section('content') ?>

<style>
    /* === 1. TOPIC CARD (KONTEN UTAMA) === */
    .topic-card {
        background: white; border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.02);
        overflow: hidden; margin-bottom: 30px;
    }

    /* Header Gambar */
    .topic-cover {
        width: 100%; height: 250px; position: relative;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%); /* Placeholder */
    }
    .topic-cover img { width: 100%; height: 100%; object-fit: cover; }
    
    .btn-back-float {
        position: absolute; top: 20px; left: 20px;
        background: rgba(255,255,255,0.9); backdrop-filter: blur(5px);
        color: #334155; border: none; padding: 8px 15px; border-radius: 50px;
        font-weight: 600; font-size: 0.85rem; text-decoration: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: 0.3s;
    }
    .btn-back-float:hover { background: white; transform: translateY(-2px); color: #1976d2; }

    /* Isi Konten */
    .topic-body { padding: 30px; }
    
    .topic-title { font-weight: 700; color: #1e293b; font-size: 1.5rem; margin-bottom: 10px; }
    
    .topic-meta {
        display: flex; align-items: center; gap: 15px;
        font-size: 0.85rem; color: #64748b; margin-bottom: 25px;
        padding-bottom: 20px; border-bottom: 1px solid #f1f5f9;
    }
    .meta-item { display: flex; align-items: center; gap: 5px; }

    .topic-content { color: #334155; line-height: 1.7; font-size: 1rem; }
    /* Agar gambar dalam Summernote responsif */
    .topic-content img { max-width: 100%; height: auto; border-radius: 10px; }

    /* === 2. COMMENT SECTION === */
    .comments-area { max-width: 800px; margin: 0 auto; }
    .section-label { font-weight: 700; color: #334155; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
    .count-badge { background: #e0f2fe; color: #0284c7; padding: 2px 10px; border-radius: 20px; font-size: 0.8rem; }

    /* Item Komentar */
    .comment-item { display: flex; gap: 15px; margin-bottom: 20px; }
    
    .comment-avatar {
        width: 45px; height: 45px; flex-shrink: 0;
        background: #f1f5f9; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; color: #1976d2; font-size: 1.1rem;
        border: 2px solid white; box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .comment-bubble {
        background: white; padding: 15px 20px; border-radius: 0 20px 20px 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03); flex-grow: 1; position: relative;
    }
    
    .comment-header { display: flex; justify-content: space-between; margin-bottom: 5px; }
    .comment-user { font-weight: 700; color: #334155; font-size: 0.95rem; }
    .comment-date { font-size: 0.75rem; color: #94a3b8; }
    
    .comment-text { color: #475569; font-size: 0.95rem; margin: 0; line-height: 1.5; white-space: pre-wrap; }

    /* Tombol Hapus Kecil */
    .btn-del-comment {
        color: #ef4444; font-size: 0.8rem; text-decoration: none;
        opacity: 0.6; transition: 0.3s; margin-left: 10px;
    }
    .btn-del-comment:hover { opacity: 1; text-decoration: underline; }

    /* Form Input */
    .comment-form-card {
        background: white; border-radius: 16px; padding: 20px;
        box-shadow: 0 -5px 20px rgba(0,0,0,0.03);
        position: sticky; bottom: 20px; margin-top: 30px;
        border: 1px solid #e2e8f0;
    }
    .input-comment {
        background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px;
        resize: none; font-size: 0.95rem;
    }
    .input-comment:focus { background: white; border-color: #1976d2; box-shadow: none; }
</style>

<div class="container-fluid py-2">

    <div class="topic-card">
        <div class="topic-cover">
            <?php if (!empty($forum['gambar'])): ?>
                <img src="<?= base_url('uploads/forum/' . $forum['gambar']) ?>" alt="Cover">
            <?php else: ?>
                <div style="width:100%; height:100%; background:linear-gradient(135deg, #64b5f6, #1976d2);"></div>
            <?php endif; ?>
            
            <a href="<?= base_url('dashboard/forum') ?>" class="btn-back-float">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="topic-body">
            <h1 class="topic-title"><?= esc($forum['judul']) ?></h1>

            <div class="topic-meta">
                <div class="meta-item">
                    <i class="bi bi-calendar3"></i> 
                    <?= date('d M Y', strtotime($forum['tanggal'])) ?>
                </div>
                <div class="meta-item">
                    <i class="bi bi-clock"></i> 
                    <?= date('H:i', strtotime($forum['tanggal'])) ?> WIB
                </div>
                <span class="badge <?= $forum['status'] == 'aktif' ? 'bg-success' : 'bg-secondary' ?> ms-auto">
                    <?= esc(ucfirst($forum['status'])) ?>
                </span>
            </div>

            <div class="topic-content">
                <?= $forum['konten'] ?> 
            </div>
        </div>
    </div>


    <div class="comments-area">
        
        <div class="section-label">
            <i class="bi bi-chat-text-fill text-primary"></i> 
            Diskusi 
            <span class="count-badge"><?= count($komentar) ?></span>
        </div>

        <?php if (empty($komentar)): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-chat-square-dots display-4 opacity-25"></i>
                <p class="mt-2">Belum ada diskusi. Jadilah yang pertama berkomentar!</p>
            </div>
        <?php else: ?>
            <?php foreach ($komentar as $k): ?>
                <?php 
                    // Buat Inisial Nama untuk Avatar
                    $inisial = strtoupper(substr($k['name'], 0, 1)); 
                ?>
                <div class="comment-item">
                    <div class="comment-avatar"><?= $inisial ?></div>
                    
                    <div class="comment-bubble">
                        <div class="comment-header">
                            <span class="comment-user"><?= esc($k['name']) ?></span>
                            <span class="comment-date"><?= date('d M H:i', strtotime($k['tanggal'])) ?></span>
                        </div>
                        
                        <p class="comment-text"><?= esc($k['isi']) ?></p>

                        <?php if (session()->get('role') === 'admin' || session()->get('id') == $k['user_id']): ?>
                            <div class="text-end mt-2">
                                <a href="<?= base_url('dashboard/forum/komentar/hapus/' . $k['id']) ?>"
                                   class="btn-del-comment"
                                   onclick="return confirm('Hapus komentar ini?')">
                                   <i class="bi bi-trash"></i> Hapus
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


        <?php if (session()->get('id')): ?>
            <div class="comment-form-card">
                <form method="post" action="<?= base_url('dashboard/forum/komentar/' . $forum['id']) ?>">
                    <?= csrf_field() ?>
                    <div class="d-flex gap-2 align-items-end">
                        <textarea name="isi" class="form-control input-comment" rows="2" 
                            placeholder="Tulis tanggapan atau pertanyaan..." required></textarea>
                        
                        <button type="submit" class="btn btn-primary" style="border-radius: 12px; height: 50px; width: 50px;">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center rounded-4 mt-4">
                Silakan <a href="<?= base_url('login') ?>" class="fw-bold text-dark">Login</a> untuk ikut berdiskusi.
            </div>
        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>