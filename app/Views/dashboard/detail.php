<?= $this->extend('layout/layout_penerima') ?>
<?= $this->section('content') ?>

<div class="container py-3">
    <h4 class="fw-bold"><?= esc($forum['judul']) ?></h4>
    <p><?= nl2br(esc($forum['konten'])) ?></p>
    <hr>

    <h6>Komentar:</h6>

    <?php if (!empty($komentar)): ?>
        <?php foreach ($komentar as $k): ?>
            <div class="mb-3 p-2 border rounded">
                <strong><?= esc($k['user_id']) ?></strong>
                <small class="text-muted"><?= date('d M Y H:i', strtotime($k['tanggal'])) ?></small>
                <p class="mb-0"><?= esc($k['isi']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">Belum ada komentar.</p>
    <?php endif; ?>

    <form action="<?= base_url('dashboard/penerima/forum/komentar/'.$forum['id']) ?>" method="post">
        <?= csrf_field() ?>
        <textarea class="form-control mb-2" name="isi" placeholder="Tulis komentar..." required></textarea>
        <button class="btn btn-primary">Kirim</button>
    </form>

    <a href="<?= base_url('forum') ?>" class="btn btn-secondary mt-3">Kembali</a>
</div>

<?= $this->endSection() ?>
