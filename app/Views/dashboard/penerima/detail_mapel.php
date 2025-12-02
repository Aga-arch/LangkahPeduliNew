<?= $this->extend('layout/layout_penerima') ?>
<?= $this->section('content') ?>

<div class="container py-4">

    <h2 class="fw-bold"><?= esc($mapel['judul_materi']) ?></h2>
    <p><?= esc($mapel['isi_materi']) ?></p>

    <hr>

    <h4 class="fw-bold mt-4 mb-2">Daftar Topik</h4>
    <?php if (!empty($topikList)): ?>
        <ul>
            <?php foreach ($topikList as $t): ?>
                <li><?= esc($t['nama_kategori']) ?></li>
            <?php endforeach ?>
        </ul>
    <?php else: ?>
        <p class="text-muted">Belum ada topik.</p>
    <?php endif; ?>

    
</div>

<?= $this->endSection() ?>