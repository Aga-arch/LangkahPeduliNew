<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>

<style>
.quiz-box {
    background: #ffffff;
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    max-width: 700px;
    margin: auto;
    animation: fadeIn .4s;
}

.quiz-title {
    font-size: 26px;
    font-weight: 700;
    color: #4f46e5;
    margin-bottom: 10px;
}

.quiz-desc {
    color: #444;
    font-size: 16px;
    margin-bottom: 20px;
}

.quiz-info {
    background: #f6f5ff;
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 25px;
}

.quiz-info p {
    margin: 0;
    font-size: 16px;
    color: #555;
}

.btn-start {
    background: #4f46e5;
    color: white;
    padding: 10px 22px;
    border-radius: 10px;
    font-size: 16px;
    text-decoration: none;
}
.btn-start:hover {
    background: #3b34c4;
}

.btn-back {
    margin-left: 10px;
    text-decoration: none;
    color: #444;
}
.btn-back:hover {
    color: #000;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

<div class="container py-5">
    <div class="quiz-box">

        <div class="quiz-title">
            <?= esc($quiz['judul_quiz']) ?>
        </div>

        <div class="quiz-desc">
            <?= esc($quiz['deskripsi']) ?>
        </div>

        <div class="quiz-info">
            <p><strong>Waktu Pengerjaan:</strong> <?= esc($quiz['waktu_menit']) ?> menit</p>
            <p><strong>Tanggal Dibuat:</strong> <?= date('d M Y', strtotime($quiz['created_at'])) ?></p>
        </div>

        <div class="mt-3">
            <a href="<?= base_url('dashboard/penerima/quiz/mulai/' . $quiz['id_quiz']) ?>" class="btn-start">Mulai Quiz</a>


            <a href="<?= base_url('dashboard/penerima/quiz') ?>" class="btn-back">
                Kembali
            </a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
