<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>
<style>
    body {
        background-color: #f8fafc;
    }

    /* HEADER MAPEL */
    .mapel-header {
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        color: white;
        padding: 60px 30px;
        border-radius: 20px;
        margin-bottom: 50px;
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.3);
        position: relative;
    }

    .mapel-header i {
        font-size: 60px;
        opacity: 0.8;
    }

    .mapel-info {
        margin-top: 20px;
    }

    .mapel-info h2 {
        font-weight: 700;
        margin-bottom: 8px;
    }

    .mapel-info p {
        color: #f3f4f6;
        font-size: 15px;
    }

    .mapel-info small {
        opacity: 0.9;
    }

    /* SECTION TITLE */
    .section-title {
        font-weight: 700;
        color: #4f46e5;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-title i {
        font-size: 22px;
    }

    /* KARTU TOPIK */
    .topik-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 25px 30px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .topik-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .topik-title {
        font-weight: 600;
        color: #4f46e5;
        margin-bottom: 8px;
    }

    .topik-date {
        font-size: 14px;
        color: #888;
        margin-top: 5px;
    }

    .btn-materi {
        background-color: #4f46e5;
        color: white;
        border-radius: 8px;
        font-size: 14px;
        padding: 6px 18px;
        border: none;
    }

    .btn-materi:hover {
        background-color: #3b34c4;
    }

    /* QUIZ CARD */
    .quiz-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 20px 25px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .quiz-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .quiz-card strong {
        color: #333;
    }

    .quiz-card small {
        color: #666;
    }

    .quiz-info {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #666;
        margin-top: 6px;
    }

    .btn-quiz {
        background-color: #4f46e5;
        color: #fff;
        border-radius: 50px;
        font-size: 14px;
        padding: 6px 18px;
        border: none;
    }

    .btn-quiz:hover {
        background-color: #3b34c4;
    }

    /* BUTTON BACK */
    .btn-back {
        border-radius: 50px;
        font-weight: 500;
        padding: 8px 22px;
        font-size: 14px;
    }

    .divider {
        border-top: 2px solid #e5e7eb;
        margin: 50px 0;
    }
</style>

<div class="container py-5">
    <!-- HEADER -->
    <div class="mapel-header text-center">
        <i class="bi bi-journal-text mb-3"></i>
        <div class="mapel-info">
            <h2><?= esc($mapel['nama_mapel'] ?? 'Nama Mata Pelajaran Tidak Ditemukan') ?></h2>
            <p><i class="bi bi-person-circle"></i> Pengajar: <?= esc($mapel['pengajar'] ?? '-') ?></p>
            <p class="mt-2"><?= esc($mapel['deskripsi'] ?? 'Belum ada deskripsi untuk mata pelajaran ini.') ?></p>
        </div>
    </div>

    <!-- TOPIK PEMBELAJARAN -->
    <h4 class="section-title"><i class="bi bi-book"></i> Topik Pembelajaran</h4>

    <?php if (!empty($topikList)): ?>
        <?php foreach ($topikList as $t): ?>
            <div class="topik-card d-flex justify-content-between align-items-start flex-wrap">
                <div>
                    <h5 class="topik-title"><?= esc($t['judul_topik']) ?></h5>
                    <p class="mb-2"><?= esc($t['deskripsi']) ?></p>
                    <p class="topik-date">📅 <?= date('d M Y', strtotime($t['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($t['tanggal_selesai'])) ?></p>
                </div>
                <button class="btn btn-materi mt-3 mt-md-0">Lihat Materi</button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">Belum ada topik pembelajaran untuk mata pelajaran ini.</p>
    <?php endif; ?>

    <div class="divider"></div>

    <!-- QUIZ TERKAIT -->
    <h4 class="section-title"><i class="bi bi-lightbulb"></i> Quiz Terkait</h4>

    <?php if (!empty($quizList)): ?>
        <?php foreach ($quizList as $q): ?>
            <div class="quiz-card d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <strong><?= esc($q['judul_quiz']) ?></strong>
                    <p class="mb-1"><?= esc($q['deskripsi_quiz']) ?></p>
                    <div class="quiz-info">
                        <span>Soal: <?= esc($q['jumlah_soal']) ?></span>
                        <span>|</span>
                        <span><?= esc($q['tingkat_kesulitan']) ?></span>
                    </div>
                </div>
                <a href="<?= base_url('dashboard/quiz/start?id=' . $q['id']) ?>" class="btn btn-quiz mt-3 mt-md-0">Mulai Quiz</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">Belum ada quiz untuk mata pelajaran ini.</p>
    <?php endif; ?>

    <div class="text-center mt-5">
        <a href="<?= base_url('dashboard/penerima/mapel') ?>" class="btn btn-outline-secondary btn-back">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Mata Pelajaran
        </a>
    </div>
</div>
<?= $this->endSection() ?>
