<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h2 class="fw-bold text-center mb-4">📝 Kerjakan Quiz</h2>

  <form action="<?= base_url('quiz/submit') ?>" method="POST" class="p-4 bg-white shadow rounded-4">
    <?php foreach ($quiz as $q): ?>
      <div class="mb-4">
        <h5><?= esc($q['pertanyaan']) ?></h5>
        <?php foreach ($q['opsi'] as $opsi): ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="q<?= $q['id'] ?>" value="<?= $opsi ?>" required>
            <label class="form-check-label"><?= $opsi ?></label>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success btn-lg">
        <i class="bi bi-send-check"></i> Kirim Jawaban
      </button>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
