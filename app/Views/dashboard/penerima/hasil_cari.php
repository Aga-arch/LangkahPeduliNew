<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>

<style>
    .hover-card {
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }
    .hover-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.12);
    }
</style>

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

                    <!-- SELURUH CARD BISA DIKLIK -->
                    <a href="<?= base_url('dashboard/penerima/mapel/' . $m['id']) ?>" 
                       class="text-decoration-none text-dark">

                        <div class="card shadow-sm border-0 h-100 hover-card">
                            <div class="card-body">
                                <h5 class="fw-semibold text-primary"><?= esc($m['judul_materi']) ?></h5>
                                <p class="text-muted mb-2"><?= esc($m['isi_materi']) ?></p>

                                <div class="small text-secondary">
                                    <i class="bi bi-person-circle"></i> <?= esc($m['pengajar']) ?>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-0 text-center pb-3">
                                <span class="badge bg-light text-secondary">
                                    Kode: <?= esc($m['id_kategori']) ?>
                                </span>
                            </div>
                        </div>

                    </a>
                    <!-- END CARD -->

                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <p class="text-center text-muted">Tidak ditemukan mata pelajaran yang sesuai.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>