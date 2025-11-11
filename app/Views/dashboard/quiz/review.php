<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5 text-center">
  <h2 class="fw-bold">📊 Hasil Quiz</h2>
  <h4 class="text-primary mb-4">Nilai kamu: <?= round($nilai, 2) ?></h4>

  <div class="card shadow-lg border-0 rounded-4 p-4 mx-auto" style="max-width: 700px;">
    <?php foreach ($review as $r): ?>
      <div class="mb-3 p-3 border-bottom">
        <h6><?= esc($r['pertanyaan']) ?></h6>
        <p>Jawaban Kamu: <span class="<?= $r['status'] == 'Benar' ? 'text-success' : 'text-danger' ?>">
          <?= esc($r['jawaban_kamu']) ?></span></p>
        <p>Jawaban Benar: <strong><?= esc($r['jawaban_benar']) ?></strong></p>
      </div>
    <?php endforeach; ?>
  </div>

  <a href="<?= base_url('quiz') ?>" class="btn btn-secondary mt-4">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Quiz
  </a>
</div>

<?= $this->endSection() ?>
