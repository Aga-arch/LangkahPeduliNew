<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h3 class="fw-bold mb-4"><i class="bi bi-chat-text"></i> Forum Diskusi</h3>

    <div class="row g-3">
        <?php if (empty($forums)): ?>
            <p>Tidak ada forum tersedia.</p>
        <?php else: ?>
            <?php foreach ($forums as $forum): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 h-100">
                        <?php if ($forum['gambar']): ?>
                            <img src="<?= base_url('uploads/forum/' . $forum['gambar']) ?>"
                                 style="height:130px; width:100%; object-fit:cover; border-radius:8px;">
                        <?php endif; ?>

                        <h5 class="fw-bold mt-2"><?= esc($forum['judul']) ?></h5>
                        <p class="small text-muted"><?= date('d M Y H:i', strtotime($forum['tanggal'])) ?></p>

                        <a href="<?= base_url('dashboard/forum/detail/' . $forum['id']) ?>" class="btn btn-primary btn-sm mt-auto">
                            Lihat Forum
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>