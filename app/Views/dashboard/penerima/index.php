<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>
<style>
    /* Header Section */
    .welcome-section {
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        color: white;
        border-radius: 16px;
        padding: 45px 30px;
        box-shadow: 0 6px 25px rgba(79, 70, 229, 0.4);
        margin-bottom: 50px;
        transition: all 0.4s ease;
    }

    .welcome-section:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.5);
    }

    /* Grid Card */
    .mapel-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        background: white;
        position: relative;
    }

    .mapel-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .mapel-banner {
        height: 150px;
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        font-weight: bold;
        position: relative;
    }

    .mapel-body {
        padding: 20px;
    }

    .mapel-body h5 {
        font-weight: 600;
        color: #4f46e5;
    }

    .mapel-body p {
        color: #555;
        font-size: 14px;
        min-height: 60px;
    }

    .pengajar {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #666;
        margin-top: 10px;
    }

    .pengajar img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .badge-mapel {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255, 255, 255, 0.85);
        color: #333;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 8px;
        font-weight: 500;
    }

    .btn-detail {
        background-color: #4f46e5;
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 500;
        padding: 7px 25px;
        margin-top: 10px;
        transition: 0.3s;
    }

    .btn-detail:hover {
        background-color: #3b34c4;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .mapel-banner {
            font-size: 32px;
            height: 130px;
        }
    }
</style>

<div class="container py-4">
    <div class="welcome-section text-center">
        <h2 class="fw-bold mb-2">Selamat Datang, <?= esc($username) ?> 👋</h2>
        <p class="mb-0">Akses semua mata pelajaran, forum, dan quiz pembelajaran di sini.</p>
    </div>

    <h4 class="fw-bold text-center mb-4 text-primary">Daftar Mata Pelajaran</h4>

    <div class="row g-4">
        <?php if (!empty($mapel)): ?>
            <?php foreach ($mapel as $m): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mapel-card h-100">
                        <div class="mapel-banner">
                            <span class="badge-mapel"><?= esc($m['kode_mapel']) ?></span>
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <div class="mapel-body">
                            <h5><?= esc($m['nama_mapel']) ?></h5>
                            <p><?= esc($m['deskripsi']) ?></p>
                            <div class="pengajar">
                                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Pengajar">
                                <span><?= esc($m['pengajar']) ?></span>
                            </div>
                            <div class="text-center">
                                <a href="<?= base_url('dashboard/penerima/mapel/' . $m['id']) ?>" class="btn btn-detail mt-3">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-muted">Belum ada mata pelajaran yang tersedia.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
