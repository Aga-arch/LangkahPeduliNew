<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>
<style>
    body {
        background-color: #f8fafc;
    }

    .welcome-section {
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        color: white;
        border-radius: 18px;
        padding: 50px 25px;
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.3);
        margin-bottom: 55px;
    }

    .mapel-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease-in-out;
        background: white;
        position: relative;
    }

    .mapel-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .mapel-banner {
        height: 140px;
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 42px;
        position: relative;
    }

    .badge-mapel {
        position: absolute;
        top: 10px;
        left: 10px;
        background: white;
        color: #333;
        padding: 5px 11px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
    }

    .mapel-body {
        padding: 20px;
    }

    .mapel-body h5 {
        color: #4f46e5;
        font-weight: 600;
    }

    .btn-detail {
        background-color: #4f46e5;
        color: white;
        border-radius: 50px;
        padding: 7px 22px;
        font-size: 14px;
        font-weight: 500;
        margin-top: 10px;
        opacity: 0;
        transition: 0.3s ease-in-out;
    }

    .mapel-card:hover .btn-detail {
        opacity: 1;
    }
</style>

<div class="container py-4">

    <div class="welcome-section text-center">
        <h2 class="fw-bold mb-2">Selamat Datang, <?= esc($username) ?> 👋</h2>
        <p>Pilih mata pelajaran di bawah untuk mulai belajar.</p>
    </div>

    <h4 class="fw-bold text-center mb-4 text-primary">Daftar Mata Pelajaran</h4>

    <div class="row g-4">
        <?php if (!empty($mapel)): ?>
            <?php foreach ($mapel as $m): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mapel-card h-100">

                        <!-- Banner -->
                        <div class="mapel-banner">
                            <span class="badge-mapel"><?= esc($m['id']) ?></span>
                            <i class="bi bi-journal-text"></i>
                        </div>

                        <!-- Body -->
                        <div class="mapel-body">
                            <h5><?= esc($m['nama_kategori']) ?></h5>

                            <div class="text-center">
                                <a href="<?= base_url('dashboard/penerima/mapel/' . $m['id']) ?>" 
                                   class="btn btn-detail">
                                   Lihat Detail
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-muted">Belum ada mata pelajaran tersedia.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
