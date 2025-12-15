<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<style>
    /* === HEADER TOOLS === */
    .page-header {
        display: flex; justify-content: space-between; align-items: center;
        flex-wrap: wrap; gap: 15px; margin-bottom: 30px;
    }
    
    .btn-add-forum {
        background: #1976d2; color: white; border-radius: 50px; padding: 10px 25px;
        font-weight: 500; text-decoration: none; border: none; box-shadow: 0 4px 10px rgba(25, 118, 210, 0.2);
        transition: 0.3s; display: inline-flex; align-items: center; gap: 8px;
    }
    .btn-add-forum:hover { background: #1565c0; transform: translateY(-2px); color: white; }

    /* === FORUM CARD MODERN === */
    .forum-card {
        background: white; border-radius: 18px; overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.02);
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%; display: flex; flex-direction: column;
        position: relative;
    }
    
    .forum-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }

    /* Bagian Gambar */
    .card-img-wrapper {
        height: 160px; width: 100%; position: relative; overflow: hidden;
        background: #f1f5f9;
    }
    
    .card-img-wrapper img {
        width: 100%; height: 100%; object-fit: cover; transition: 0.5s;
    }
    
    .forum-card:hover .card-img-wrapper img { transform: scale(1.05); }

    /* Placeholder jika tidak ada gambar */
    .img-placeholder {
        width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, #e0f2fe 0%, #bbdefb 100%);
        color: #1976d2; font-size: 40px;
    }

    /* Badge Status Mengambang */
    .status-badge {
        position: absolute; top: 15px; right: 15px;
        padding: 5px 12px; border-radius: 30px;
        font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        backdrop-filter: blur(4px);
    }
    .status-aktif { background: rgba(220, 252, 231, 0.9); color: #166534; }
    .status-nonaktif { background: rgba(254, 226, 226, 0.9); color: #991b1b; }

    /* Body Card */
    .card-content { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
    
    .forum-title { font-weight: 700; color: #334155; font-size: 1.1rem; margin-bottom: 8px; line-height: 1.4; }
    .forum-date { font-size: 0.8rem; color: #94a3b8; margin-bottom: 15px; display: flex; align-items: center; gap: 5px; }

    /* Action Buttons */
    .action-row {
        margin-top: auto; padding-top: 15px; border-top: 1px solid #f1f5f9;
        display: flex; justify-content: flex-end; gap: 8px;
    }

    .btn-action {
        width: 35px; height: 35px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        transition: 0.2s; border: none; font-size: 14px;
    }

    .btn-edit { background: #fff7ed; color: #ea580c; }
    .btn-edit:hover { background: #ea580c; color: white; }
    
    .btn-delete { background: #fef2f2; color: #dc2626; }
    .btn-delete:hover { background: #dc2626; color: white; }

</style>

<div class="container-fluid py-2">

    <div class="page-header">
        <div>
            <h3 class="fw-bold mb-1" style="color: #1e293b;">Kelola Forum</h3>
            <p class="text-muted mb-0">Total Topik Diskusi: <?= count($forums) ?></p>
        </div>
        
        <a href="<?= base_url('dashboard/admin/tambah-forum') ?>" class="btn-add-forum">
            <i class="bi bi-plus-lg"></i> Buat Forum Baru
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        <?php if (!empty($forums)): ?>
            <?php foreach ($forums as $forum): ?>
                
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="forum-card">
                        
                        <div class="card-img-wrapper">
                            <?php if ($forum['gambar']): ?>
                                <img src="<?= base_url('uploads/forum/'.$forum['gambar']) ?>" alt="Forum Cover">
                            <?php else: ?>
                                <div class="img-placeholder">
                                    <i class="bi bi-chat-square-text"></i>
                                </div>
                            <?php endif; ?>

                            <span class="status-badge <?= $forum['status'] == 'aktif' ? 'status-aktif' : 'status-nonaktif' ?>">
                                <?= esc($forum['status']) ?>
                            </span>
                        </div>

                        <div class="card-content">
                            <div class="forum-title">
                                <?= esc($forum['judul']) ?>
                            </div>
                            
                            <div class="forum-date">
                                <i class="bi bi-calendar3"></i> 
                                <?= date('d M Y, H:i', strtotime($forum['tanggal'])) ?> WIB
                            </div>

                            <div class="action-row">
                                <a href="<?= base_url('dashboard/admin/edit-forum/'.$forum['id']) ?>" 
                                   class="btn-action btn-edit" title="Edit Forum">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                
                                <a href="<?= base_url('dashboard/admin/hapus-forum/'.$forum['id']) ?>" 
                                   onclick="return confirm('Yakin ingin menghapus forum ini? Semua komentar di dalamnya juga akan terhapus.')" 
                                   class="btn-action btn-delete" title="Hapus Forum">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>

            <div class="col-12 text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-chat-square-quote display-1 text-light"></i>
                </div>
                <h5 class="text-muted">Belum ada forum diskusi.</h5>
                <p class="text-muted small">Silakan buat forum baru untuk memulai diskusi.</p>
            </div>

        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>