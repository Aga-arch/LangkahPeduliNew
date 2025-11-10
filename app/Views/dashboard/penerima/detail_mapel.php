<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>
<style>
    .detail-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
        padding: 40px;
        max-width: 900px;
        margin: 40px auto;
        position: relative;
    }

    .banner {
        height: 220px;
        border-radius: 16px;
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
    }

    .badge-mapel {
        position: absolute;
        top: 30px;
        left: 40px;
        background: rgba(255, 255, 255, 0.9);
        color: #333;
        font-weight: 600;
        font-size: 14px;
        padding: 6px 12px;
        border-radius: 8px;
    }

    .mapel-info {
        margin-top: 30px;
    }

    .mapel-info h3 {
        color: #4f46e5;
        font-weight: 700;
    }

    .quiz-section {
        margin-top: 40px;
    }

    .quiz-card {
        border-radius: 14px;
        border: none;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
    }

    .quiz-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .btn-quiz {
        border-radius: 50px;
        font-size: 14px;
        background: #4f46e5;
        color: #fff;
        border: none;
        padding: 7px 18px;
    }

    .btn-quiz:hover {
        background: #3b34c4;
    }
</style>

<div class="container py-5">
    <div class="detail-card">
        <div class="banner">
            <i class="bi bi-journal-text"></i>
            <span class="badge-mapel"><?= esc($mapel['kode_mapel']) ?></span>
        </div>

        <div class="mapel-info">
            <h3><?= esc($mapel['nama_mapel']) ?></h3>
            <div class="text-muted mb-3">
                <i class="bi bi-person-circle"></i> Pengajar: <?= esc($mapel['pengajar']) ?>
            </div>
            <p class="text-secondary mb-4" style="line-height:1.7;">
                <?= esc($mapel['deskripsi']) ?>
            </p>

            <div class="text-end">
                <a href="<?= base_url('dashboard/penerima') ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Daftar Quiz -->
        <div class="quiz-section">
            <h4 class="fw-bold mb-4 text-primary"><i class="bi bi-lightbulb"></i> Quiz Terkait</h4>

            <?php if (!empty($quizList)): ?>
                <div class="row g-4">
                    <?php foreach ($quizList as $q): ?>
                        <div class="col-md-6">
                            <div class="card quiz-card h-100">
                                <div class="card-body">
                                    <h5 class="fw-semibold text-dark"><?= esc($q['judul_quiz']) ?></h5>
                                    <p class="text-muted small mb-2"><?= esc($q['deskripsi_quiz']) ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-light text-secondary">
                                            Soal: <?= esc($q['jumlah_soal']) ?> |
                                            <?= esc($q['tingkat_kesulitan']) ?>
                                        </span>
                                        <button class="btn btn-quiz btn-sm">Mulai Quiz</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-muted">Belum ada quiz untuk mata pelajaran ini.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
