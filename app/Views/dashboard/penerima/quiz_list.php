<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>

<style>
.quiz-card {
    background: #ffffff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: 0.25s;
    border-left: 6px solid #4f46e5;
}
.quiz-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.12);
}

.quiz-title {
    font-size: 20px;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
}

.quiz-meta {
    font-size: 14px;
    color: #666;
    margin-bottom: 12px;
}

.btn-start {
    background: #4f46e5;
    color: white;
    padding: 7px 16px;
    border-radius: 8px;
    font-size: 14px;
    text-decoration: none;
}
.btn-start:hover {
    background: #3b34c4;
}
</style>

<div class="container py-4">
    <h3 class="mb-4 fw-bold">Daftar Quiz</h3>

    <?php if (empty($quiz)) : ?>
        <div class="alert alert-info">Belum ada quiz tersedia.</div>
    <?php else : ?>

        <div class="row g-3">

            <?php foreach ($quiz as $q) : ?>
            <div class="col-md-6 col-lg-4">
                <div class="quiz-card">

                    <div class="quiz-title">
                        <?= esc($q['judul_quiz']) ?>
                    </div>

                    <div class="quiz-meta">
                        <strong>Bank Soal:</strong> <?= esc($q['nama_banksoal'] ?? '-') ?><br>
                        <strong>Waktu:</strong> <?= esc($q['waktu_menit']) ?> menit
                    </div>

                    <a href="<?= base_url('dashboard/penerima/quiz/' . $q['id_quiz']) ?>" 
                       class="btn-start">
                        Lihat Quiz
                    </a>

                </div>
            </div>
            <?php endforeach ?>

        </div>

    <?php endif ?>
</div>

<?= $this->endSection() ?>
