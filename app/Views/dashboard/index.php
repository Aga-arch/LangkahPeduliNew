<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-trophy-fill text-warning fs-1 mb-2"></i>
                <h5>Penghargaan</h5>
                <p>Lihat pencapaian dan badge yang telah kamu raih.</p>
                <a href="<?= base_url('penghargaan') ?>" class="btn btn-outline-warning mt-2">Lihat Sekarang</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-question-circle-fill text-primary fs-1 mb-2"></i>
                <h5>Quiz</h5>
                <p>Kerjakan quiz untuk menambah pengetahuanmu.</p>
                <a href="<?= base_url('quiz') ?>" class="btn btn-outline-primary mt-2">Mulai Quiz</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-chat-dots-fill text-success fs-1 mb-2"></i>
                <h5>Forum</h5>
                <p>Bergabung dengan forum untuk berdiskusi dan berbagi ide.</p>
                <a href="<?= base_url('dashboard/forum') ?>" class="btn btn-outline-success mt-2">Masuk Forum</a>
            </div>
        </div>
        <div class="col-md-4">
    <div class="card p-4 text-center">
        <i class="bi bi-person-circle text-primary fs-1 mb-2"></i>
        <h5>Profil</h5>
        <p>Lihat informasi akun dan waktu login terakhir kamu.</p>
        <a href="<?= base_url('dashboard/profil') ?>" class="btn btn-outline-primary mt-2">Cek Profil</a>
    </div>
</div>

    </div>
</div>

<?= $this->endSection() ?>
