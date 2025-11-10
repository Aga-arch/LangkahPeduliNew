<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <div class="text-center mb-5">
        <h3 class="fw-bold text-primary">Hasil Pencarian: "<?= esc($keyword) ?>"</h3>
        <p class="text-muted">Ditemukan <?= count($mapel) ?> hasil yang cocok.</p>
        <a href="<?= base_url('dashboard/penerima') ?>" class="btn btn-outline-primary btn-sm mt-2">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="row g-4">
        <?php if (!empty($mapel)): ?>
            <?php foreach ($mapel as $m): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="fw-semibold text-primary"><?= esc($m['nama_mapel']) ?></h5>
                            <p class="text-muted mb-2"><?= esc($m['deskripsi']) ?></p>
                            <div class="small text-secondary">
                                <i class="bi bi-person-circle"></i> <?= esc($m['pengajar']) ?>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-3">
                            <span class="badge bg-light text-secondary">Kode: <?= esc($m['kode_mapel']) ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-muted">Tidak ditemukan mata pelajaran yang sesuai.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
