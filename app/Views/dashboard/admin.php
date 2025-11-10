<?= $this->extend('layout/dashboard_admin') ?>

<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold text-primary mb-3">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard Admin
            </h2>
            <p>Selamat datang kembali, <strong><?= esc($username) ?></strong> 👋</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-people-fill fs-1 text-primary mb-3"></i>
                <h5>Kelola Akun</h5>
                <p class="text-muted mb-3">Lihat, verifikasi, atau hapus akun pengguna.</p>
                <a href="<?= base_url('dashboard/admin/kelola-akun') ?>" class="btn btn-primary">
                    Buka <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-chat-dots-fill fs-1 text-success mb-3"></i>
                <h5>Kelola Forum</h5>
                <p class="text-muted mb-3">Atur topik forum, komentar, dan laporan pengguna.</p>
                <a href="<?= base_url('dashboard/admin/kelola-forum') ?>" class="btn btn-success">
                    Buka <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-person-lines-fill fs-1 text-warning mb-3"></i>
                <h5>Profil Saya</h5>
                <p class="text-muted mb-3">Lihat dan ubah data profil admin Anda.</p>
                <a href="<?= base_url('dashboard/profil') ?>" class="btn btn-warning text-white">
                    Lihat Profil <i class="bi bi-person-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <div class="card p-4">
                <h4 class="fw-bold text-secondary mb-3">
                    <i class="bi bi-graph-up-arrow me-2"></i> Statistik Sistem
                </h4>
                <p class="text-muted">
                    Di sini nanti kamu bisa tampilkan statistik sistem, misalnya jumlah pengguna aktif, jumlah topik forum, atau donasi yang masuk.
                </p>
                <div class="d-flex flex-wrap gap-4 mt-3">
                    <div class="bg-primary bg-opacity-10 border rounded-3 p-3 text-center flex-fill">
                        <h5 class="fw-bold text-primary mb-1">124</h5>
                        <p class="mb-0">Total Pengguna</p>
                    </div>
                    <div class="bg-success bg-opacity-10 border rounded-3 p-3 text-center flex-fill">
                        <h5 class="fw-bold text-success mb-1">56</h5>
                        <p class="mb-0">Topik Forum</p>
                    </div>
                    <div class="bg-warning bg-opacity-10 border rounded-3 p-3 text-center flex-fill">
                        <h5 class="fw-bold text-warning mb-1">8</h5>
                        <p class="mb-0">Laporan Baru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
