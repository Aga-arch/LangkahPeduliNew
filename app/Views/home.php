<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <h1 class="fw-bold display-5 text-primary mb-3">Langkah Peduli</h1>
    <p class="lead text-secondary mb-4">
      Platform e-learning yang membantu kamu melangkah menuju perubahan melalui pembelajaran dan kepedulian sosial.
    </p>
    <a href="<?= base_url('kursus') ?>" class="btn btn-primary btn-lg me-2">Mulai Belajar</a>
    <a href="<?= base_url('login') ?>" class="btn btn-outline-primary btn-lg">Masuk</a>
  </div>
</section>

<!-- Fitur Utama -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Kenapa Pilih Langkah Peduli?</h2>
      <p class="text-muted">Belajar dan berbuat baik bisa berjalan beriringan.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body text-center">
            <i class="bi bi-journal-text text-primary fs-1 mb-3"></i>
            <h5 class="card-title fw-bold">Materi Interaktif</h5>
            <p class="text-muted">Pelajari topik menarik dengan video, kuis, dan tugas praktis yang membuat belajar jadi seru.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body text-center">
            <i class="bi bi-people text-primary fs-1 mb-3"></i>
            <h5 class="card-title fw-bold">Komunitas Peduli</h5>
            <p class="text-muted">Bergabung dengan komunitas yang aktif dalam kegiatan sosial dan pengembangan diri.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body text-center">
            <i class="bi bi-lightbulb text-primary fs-1 mb-3"></i>
            <h5 class="card-title fw-bold">Belajar Berdampak</h5>
            <p class="text-muted">Setiap langkah belajar kamu berkontribusi untuk membantu sesama dan lingkungan sekitar.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="py-4 bg-primary text-white text-center">
  <p class="mb-0">&copy; <?= date('Y') ?> Langkah Peduli — Bersama Menciptakan Perubahan</p>
</footer>

<?= $this->endSection() ?>
