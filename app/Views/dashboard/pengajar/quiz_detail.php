<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Detail Quiz</h3>

<div class="card p-3 mb-3">
    <h5><?= esc($quiz['judul_quiz']) ?></h5>
    <p><?= esc($quiz['deskripsi']) ?></p>
    <p>Waktu pengerjaan: <strong><?= $quiz['waktu_menit'] ?> menit</strong></p>
</div>

<h5>Daftar Soal</h5>

<?php if (!empty($soal)): ?>
    <ol>
        <?php foreach ($soal as $s): ?>
            <li>
                <?= esc($s['isi_soal']) ?>
            </li>
        <?php endforeach; ?>
    </ol>
<?php else: ?>
    <p class="text-danger">Tidak ada soal yang dipakai dalam quiz ini.</p>
<?php endif; ?>

<a href="<?= base_url('dashboard/pengajar/quiz') ?>" class="btn btn-secondary mt-3">
    Kembali
</a>

<?= $this->endSection() ?>
