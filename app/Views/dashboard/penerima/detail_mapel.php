<?= $this->extend('layout/layout_penerima') ?>
<?= $this->section('content') ?>

<style>
    .materi-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: white;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .materi-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .materi-banner {
        height: 140px;
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 45px;
    }

    .materi-title {
        font-weight: 600;
        font-size: 18px;
        color: #4f46e5;
    }

    .materi-body {
        padding: 20px;
    }

    .materi-small {
        color: #777;
        font-size: 13px;
    }
</style>

<div class="container mt-4">

    <h3 class="text-primary fw-bold">
        Materi: <?= esc($mapel['nama_kategori']) ?>
    </h3>
    <p class="text-muted">Pilih materi untuk mulai belajar:</p>

    <div class="row g-4 mt-3">

        <?php if (!empty($materiList)): ?>
            <?php foreach ($materiList as $m): ?>

                <div class="col-lg-4 col-md-6">
                    <a href="<?= base_url('dashboard/penerima/materi/' . $m['id']) ?>" style="text-decoration: none;">
                        <div class="materi-card">

                            <div class="materi-banner">
                                <i class="bi bi-journal-text"></i>
                            </div>

                            <div class="materi-body">
                                <div class="materi-title"><?= esc($m['judul_materi']) ?></div>
                                <p class="materi-small mt-2">Pengajar: <?= esc($m['pengajar']) ?></p>
                            </div>

                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        <?php else: ?>

            <p class="text-muted">Belum ada materi untuk kategori ini.</p>

        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>
