<?= $this->extend('layout/layout_penerima') ?>
<?= $this->section('content') ?>

<style>
    /* === HEADER SECTION === */
    .forum-header {
        background: linear-gradient(135deg, #e3f2fd 0%, #ffffff 100%);
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        margin-bottom: 40px;
        border: 1px solid rgba(0,0,0,0.02);
    }
    
    .search-input-group {
        max-width: 600px; margin: 0 auto; position: relative;
    }
    
    .search-input {
        border-radius: 50px; padding: 15px 25px 15px 50px; border: 1px solid #cbd5e1;
        width: 100%; transition: 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }
    .search-input:focus { border-color: #1976d2; box-shadow: 0 0 0 4px rgba(25, 118, 210, 0.1); outline: none; }
    
    .search-icon {
        position: absolute; left: 20px; top: 50%; transform: translateY(-50%);
        color: #94a3b8; font-size: 1.2rem;
    }

    /* === FORUM CARD === */
    .forum-card {
        background: white; border-radius: 16px; overflow: hidden;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%; display: flex; flex-direction: column;
        text-decoration: none; color: inherit; /* Agar seluruh kartu bisa diklik */
        position: relative;
    }
    
    .forum-card:hover { transform: translateY(-8px); box-shadow: 0 15px 30px rgba(0,0,0,0.08); }

    /* Gambar Cover */
    .cover-wrapper {
        height: 180px; width: 100%; position: relative; overflow: hidden;
    }
    
    .cover-img {
        width: 100%; height: 100%; object-fit: cover; transition: 0.5s;
    }
    .forum-card:hover .cover-img { transform: scale(1.05); }

    /* Placeholder jika tidak ada gambar */
    .cover-placeholder {
        width: 100%; height: 100%;
        background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 100%);
        display: flex; align-items: center; justify-content: center;
        color: rgba(255,255,255,0.3); font-size: 60px;
    }

    /* Konten Kartu */
    .card-body { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
    
    .forum-title {
        font-weight: 700; font-size: 1.1rem; color: #1e293b;
        margin-bottom: 10px; line-height: 1.4;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    }
    .forum-card:hover .forum-title { color: #1976d2; }

    .forum-meta {
        font-size: 0.85rem; color: #64748b; margin-top: auto;
        display: flex; align-items: center; gap: 6px;
    }

    /* Tombol Baca */
    .btn-read {
        margin-top: 15px; width: 100%;
        background: #f1f5f9; color: #475569;
        border: none; padding: 10px; border-radius: 10px;
        font-weight: 600; font-size: 0.9rem; transition: 0.2s; text-align: center;
    }
    .forum-card:hover .btn-read { background: #1976d2; color: white; }
</style>

<div class="container-fluid py-2">

    <div class="forum-header">
        <h2 class="fw-bold mb-2" style="color: #1e293b;">Forum Diskusi</h2>
        <p class="text-muted mb-4">Temukan topik menarik dan mulailah berdiskusi dengan komunitas.</p>
        
        <div class="search-input-group">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari topik diskusi...">
        </div>
    </div>

    <div class="row g-4">
        <?php if (!empty($forums)): ?>
            <?php foreach ($forums as $forum): ?>
                
                <div class="col-md-6 col-lg-4">
                    <a href="<?= base_url('dashboard/forum/detail/' . $forum['id']) ?>" class="forum-card">
                        
                        <div class="cover-wrapper">
                            <?php if ($forum['gambar']): ?>
                                <img src="<?= base_url('uploads/forum/' . $forum['gambar']) ?>" class="cover-img" alt="Forum Cover">
                            <?php else: ?>
                                <div class="cover-placeholder">
                                    <i class="bi bi-chat-square-quote-fill"></i>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <h5 class="forum-title"><?= esc($forum['judul']) ?></h5>
                            
                            <div class="forum-meta">
                                <i class="bi bi-calendar-event"></i>
                                <?= date('d M Y', strtotime($forum['tanggal'])) ?>
                                <span class="mx-1">•</span>
                                <i class="bi bi-clock"></i>
                                <?= date('H:i', strtotime($forum['tanggal'])) ?> WIB
                            </div>

                            <div class="btn-read">
                                Lihat Diskusi
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            
            <div class="col-12 text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-chat-left-text display-1 text-muted opacity-25"></i>
                </div>
                <h4 class="text-muted fw-bold">Belum ada diskusi</h4>
                <p class="text-muted">Jadilah yang pertama membuat topik diskusi baru!</p>
            </div>

        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>