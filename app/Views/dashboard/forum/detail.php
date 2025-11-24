<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h3 class="fw-bold mb-3"><?= esc($forum['judul']) ?></h3>

    <?php if ($forum['gambar']): ?>
        <img src="<?= base_url('uploads/forum/' . $forum['gambar']) ?>"
            style="max-width:400px; border-radius:10px; margin-bottom:15px;">
    <?php endif; ?>

    <p><?= $forum['konten'] ?></p>
    <p class="text-muted">Dibuat <?= date('d M Y H:i', strtotime($forum['tanggal'])) ?></p>

    <hr>

    <h5>Komentar</h5>
    <?php if (empty($komentar)): ?>
        <p>Belum ada komentar.</p>
    <?php else: ?>
        <?php foreach ($komentar as $k): ?>
            <div class="p-2 mb-2 border rounded bg-light">
                <p><?= esc($k['isi']) ?></p>
                <span class="small text-muted"><?= date('d M Y H:i', strtotime($k['tanggal'])) ?></span>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="post" action="<?= base_url('dashboard/forum/komentar/' . $forum['id']) ?>">
        <?= csrf_field() ?>
        <textarea name="isi" class="form-control mb-2" rows="3" placeholder="Tulis komentar..." required></textarea>
        <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
    </form>

    <a href="<?= base_url('dashboard/forum') ?>" class="btn btn-secondary btn-sm mt-3">Kembali</a>
</div>

<?= $this->endSection() ?>
