<?= $this->extend('layout/dashboard_pengajar') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h2 class="mb-4">Selamat datang, <?= esc($username) ?>!</h2>
    <div class="row">
        <!-- Card Dashboard -->
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h5>Dashboard</h5>
                <p>Ringkasan aktivitas pengajar.</p>
            </div>
        </div>
        <!-- Card Materi -->
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h5>Kelola Materi</h5>
                <p>Tambah, edit, atau hapus materi pembelajaran.</p>
                <a href="<?= base_url('dashboard/materi') ?>" class="btn btn-primary btn-sm mt-2">Kelola Materi</a>
            </div>
        </div>
        <!-- Card Quiz -->
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h5>Kelola Quiz</h5>
                <p>Kelola soal dan quiz untuk siswa.</p>
                <a href="<?= base_url('Pengajar/quiz') ?>" class="btn btn-primary btn-sm mt-2">Kelola Quiz</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
