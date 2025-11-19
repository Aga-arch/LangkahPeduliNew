<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h3 class="fw-bold mb-3">💬 Forum: <?= esc($room) ?></h3>

    <div class="card p-3 mb-4">
        <h5>Diskusi Utama</h5>
        <p>Belum ada diskusi. Jadilah yang pertama mengirim pesan!</p>
    </div>

    <form method="post" action="">
        <textarea class="form-control mb-3" 
                  placeholder="Tulis pesan..." rows="3"></textarea>

        <button class="btn btn-primary">Kirim</button>
    </form>
</div>

<?= $this->endSection() ?>
