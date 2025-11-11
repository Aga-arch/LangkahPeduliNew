<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<h4>Quiz</h4>
<p>Pilih quiz untuk mulai mengerjakan.</p>
<a href="<?= base_url('quiz/start') ?>" class="btn btn-primary">Mulai Sekarang</a>

<?= $this->endSection() ?>
