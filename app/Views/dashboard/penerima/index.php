<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<style>
.menu-card {
    border-radius: 18px;
    padding: 35px 20px;
    background: #fff;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    transition: 0.3s;
    text-align: center;
}
.menu-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}
.menu-card i {
    font-size: 55px;
    color: #4f46e5;
    margin-bottom: 15px;
}
.menu-card h5 {
    font-weight: 600;
    color: #333;
}
.menu-card p {
    color: #666;
    font-size: 14px;
}
.btn-go {
    border-radius: 50px;
    font-weight: 500;
    background-color: #4f46e5;
    color: white;
    border: none;
    padding: 8px 25px;
}
.btn-go:hover {
    background-color: #3b34c4;
}
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Selamat Datang, <?= esc($username) ?> 👋</h2>
        <p class="text-muted">Pilih menu di bawah untuk memulai pembelajaranmu.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Mata Pelajaran -->
        <div class="col-md-4">
            <div class="menu-card h-100">
                <i class="bi bi-book"></i>
                <h5>Mata Pelajaran</h5>
                <p>Lihat semua mata pelajaran dan mulai belajar.</p>
                <a href="<?= base_url('dashboard/penerima/mapel') ?>" class="btn btn-go mt-2">Masuk</a>
            </div>
        </div>

        <!-- Forum -->
        <div class="col-md-4">
            <div class="menu-card h-100">
                <i class="bi bi-chat-text"></i>
                <h5>Forum Diskusi</h5>
                <p>Berdiskusi dengan pengajar dan peserta lainnya.</p>
                <a href="<?= base_url('dashboard/forum') ?>" class="btn btn-go mt-2">Masuk Forum</a>
            </div>
        </div>

        <!-- Quiz -->
        <div class="col-md-4">
            <div class="menu-card h-100">
                <i class="bi bi-question-circle"></i>
                <h5>Quiz</h5>
                <p>Uji pemahamanmu melalui berbagai quiz interaktif.</p>
                <a href="<?= base_url('dashboard/quiz') ?>" class="btn btn-go mt-2">Mulai Quiz</a>
            </div>
        </div>

        <div class="col-md-4">
    <div class="menu-card h-100">
        <i class="bi bi-award"></i>
        <h5>Penghargaan</h5>
        <p>Lihat pencapaian dan badge yang telah kamu peroleh.</p>
        <a href="<?= base_url('dashboard/penerima/penghargaan') ?>" class="btn btn-go mt-2">Lihat</a>
    </div>
</div>

    </div>
</div>
<?= $this->endSection() ?>
