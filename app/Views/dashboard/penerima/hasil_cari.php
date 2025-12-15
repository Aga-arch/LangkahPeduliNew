<?= $this->extend('layout/layout_penerima') ?> 
<?= $this->section('content') ?>

<style>
    /* Menggunakan CSS yang sama dengan detailMapel agar tampilan konsisten */
    .materi-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: white;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        height: 100%; /* Agar tinggi kartu sama rata */
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
        margin-bottom: 5px;
        line-height: 1.4;
    }

    .materi-body {
        padding: 20px;
    }

    .materi-small {
        color: #777;
        font-size: 13px;
        margin-bottom: 0;
    }
    
    .badge-kategori {
        background-color: #e0e7ff;
        color: #4f46e5;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 10px;
    }
</style>

<div class="container mt-4">

    <h3 class="text-primary fw-bold">
        Hasil Pencarian: "<?= esc($keyword) ?>"
    </h3>
    <p class="text-muted">Ditemukan <?= count($mapel) ?> materi yang cocok.</p>

    <div class="row g-4 mt-3">

        <?php if (!empty($mapel)): ?>
            <?php foreach ($mapel as $m): ?>

                <div class="col-lg-4 col-md-6">
                    <a href="<?= base_url('dashboard/penerima/materi/' . $m['id']) ?>" style="text-decoration: none;">
                        <div class="materi-card">

                            <div class="materi-banner">
                                <i class="bi bi-search"></i> </div>

                            <div class="materi-body">
                                <span class="badge-kategori">
                                    <?= esc($m['nama_kategori']) ?>
                                </span>

                                <div class="materi-title">
                                    <?= esc($m['judul_materi']) ?>
                                </div>
                                
                                <p class="materi-small mt-2">
                                    <i class="bi bi-person-circle me-1"></i> 
                                    Pengajar: <?= esc($m['pengajar']) ?>
                                </p>
                            </div>

                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        <?php else: ?>

            <div class="col-12 text-center py-5">
                <div style="font-size: 60px; color: #cbd5e1;">
                    <i class="bi bi-emoji-frown"></i>
                </div>
                <h4 class="mt-3 text-secondary">Materi tidak ditemukan</h4>
                <p class="text-muted">Coba gunakan kata kunci lain.</p>
                <a href="<?= base_url('dashboard/penerima/mapel') ?>" class="btn btn-outline-primary mt-2">
                    Kembali ke Daftar Mapel
                </a>
            </div>

        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>