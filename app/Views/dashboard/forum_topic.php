<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="fw-bold text-primary"><?= esc($topic['judul']) ?></h3>
    <p class="mt-2"><?= esc($topic['isi']) ?></p>

    <hr>

    <h5>Tulis Komentar</h5>
    <form action="<?= base_url('dashboard/forum/addComment') ?>" method="post">
        <textarea name="comment" class="form-control mb-2" rows="3" placeholder="Tulis komentar kamu di sini..."></textarea>
        <button type="submit" class="btn btn-success">Kirim</button>
    </form>
</div>

<?= $this->endSection() ?>
