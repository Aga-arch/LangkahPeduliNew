<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5 text-center">
  <h2 class="fw-bold mb-3">🎯 Quiz Interaktif</h2>
  <p class="text-muted">Uji kemampuanmu dan dapatkan nilai terbaik!</p>
  <a href="<?= base_url('quiz/start') ?>" class="btn btn-primary btn-lg shadow-lg">
    <i class="bi bi-lightning-charge"></i> Mulai Quiz
  </a>
</div>

<?= $this->endSection() ?>
