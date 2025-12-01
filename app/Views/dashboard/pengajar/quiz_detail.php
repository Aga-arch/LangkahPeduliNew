<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h3 class="fw-bold header-gradient mb-4">Detail Quiz</h3>

    <div class="card glass-card p-4 mb-3">
        <h5 class="fw-semibold"><?= esc($quiz['judul_quiz']) ?></h5>
        <p><?= esc($quiz['deskripsi']) ?></p>
        <p>Waktu pengerjaan: <strong><?= $quiz['waktu_menit'] ?> menit</strong></p>
    </div>

    <h5 class="mb-3">Daftar Soal</h5>
    <?php if (!empty($soal)): ?>
        <ol class="ps-3">
            <?php foreach ($soal as $s): ?>
                <li class="mb-2"><?= esc($s['isi_soal']) ?></li>
            <?php endforeach; ?>
        </ol>
    <?php else: ?>
        <p class="text-danger fst-italic">Tidak ada soal yang dipakai dalam quiz ini.</p>
    <?php endif; ?>

    <a href="<?= base_url('dashboard/pengajar/quiz') ?>" class="btn btn-gradient btn-hover mt-3">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>
</div>

<style>
    .glass-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(10px); border:1px solid rgba(0,123,255,0.15); border-radius:1rem;}
    .header-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);-webkit-background-clip:text;color:transparent;}
    .btn-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);color:#fff;font-weight:600;transition:all 0.3s ease;border:none;}
    .btn-gradient:hover{transform: translateY(-2px);box-shadow:0 6px 15px rgba(0,123,255,0.3);}
    .btn-hover{transition:all 0.3s ease;}
</style>

<?= $this->endSection() ?>
