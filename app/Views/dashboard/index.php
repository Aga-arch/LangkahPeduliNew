<?= $this->extend('layout/layout_penerima') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h4 class="fw-bold mb-3">Forum Diskusi</h4>

    <?php foreach ($forums as $f): ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="fw-semibold"><?= esc($f['judul']) ?></h5>
                <small class="text-muted"><?= date('d M Y', strtotime($f['tanggal'])) ?></small><br>
                <a href="<?= base_url('dashboard/penerima/forum/detail/' . $f['id']) ?>">
                    Lihat Diskusi
                </a>

            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>