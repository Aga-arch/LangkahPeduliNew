<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="text-center mb-4">
        <i class="bi bi-chat-dots-fill text-success" style="font-size: 3rem;"></i>
        <h2 class="mt-3 fw-bold">Forum Diskusi</h2>
        <p class="text-muted">Tempat berbagi ide, pengalaman, dan berdiskusi dengan pengguna lain.</p>
    </div>

    <div class="row">
        <?php if (!empty($topics)) : ?>
            <?php foreach ($topics as $topic) : ?>
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm border-0 p-3">
                        <div class="card-body">
                            <h5 class="fw-bold text-primary"><?= esc($topic['judul']) ?></h5>
                            <p class="text-muted small">Oleh <?= esc($topic['penulis']) ?> • <?= esc($topic['tanggal']) ?></p>
                            <a href="<?= base_url('dashboard/forum/topic/' . $topic['id']) ?>" class="btn btn-outline-success btn-sm mt-2">
                                Lihat Diskusi
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 text-center text-muted">
                <i class="bi bi-emoji-frown" style="font-size: 2rem;"></i>
                <p class="mt-2">Belum ada topik forum yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
