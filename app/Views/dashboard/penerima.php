<?= $this->extend('dashboard/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h2 class="mb-4">Selamat datang, <?= esc($username) ?>!</h2>

    <div class="row">
        <!-- Card Profil -->
        <div class="col-md-4 mb-3">
            <div class="card p-3 shadow-sm">
                <h5>Profil</h5>
                <p>Lihat dan ubah data profil kamu.</p>
                <a href="<?= base_url('dashboard/profil') ?>" class="btn btn-primary btn-sm mt-2">Lihat Profil</a>
            </div>
        </div>

        <!-- Card Materi -->
        <div class="col-md-4 mb-3">
            <div class="card p-3 shadow-sm">
                <h5>Materi Pembelajaran</h5>
                <p>Akses materi yang telah dibagikan pengajar.</p>
                <a href="<?= base_url('dashboard/materi') ?>" class="btn btn-primary btn-sm mt-2">Lihat Materi</a>
            </div>
        </div>

        <!-- Card Quiz -->
        <div class="col-md-4 mb-3">
            <div class="card p-3 shadow-sm">
                <h5>Quiz & Evaluasi</h5>
                <p>Kerjakan quiz untuk mengukur pemahamanmu.</p>
                <a href="<?= base_url('dashboard/quiz') ?>" class="btn btn-primary btn-sm mt-2">Mulai Quiz</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
