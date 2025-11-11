<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<h1>Selamat Datang di Dashboard 🎉</h1>
<p>Jelajahi fitur-fitur di Langkah Peduli:</p>

<div class="row g-4 mt-3">
  <div class="col-md-4">
    <div class="card p-3">
      <h5><i class="bi bi-award-fill text-primary me-2"></i> Penghargaan</h5>
      <p class="text-muted">Lihat prestasi dan penghargaanmu.</p>
      <a href="<?= base_url('dashboard/penghargaan') ?>" class="btn btn-outline-primary w-100">Lihat Sekarang</a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3">
      <h5><i class="bi bi-question-circle-fill text-primary me-2"></i> Quiz</h5>
      <p class="text-muted">Uji pengetahuanmu melalui quiz interaktif!</p>
      <a href="<?= base_url('dashboard/quiz') ?>" class="btn btn-outline-primary w-100">Mulai Quiz</a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3">
      <h5><i class="bi bi-chat-dots-fill text-primary me-2"></i> Forum</h5>
      <p class="text-muted">Bergabung dalam forum diskusi.</p>
      <a href="<?= base_url('dashboard/forum') ?>" class="btn btn-outline-primary w-100">Masuk Forum</a>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
