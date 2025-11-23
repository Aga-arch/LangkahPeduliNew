<?= $this->extend('layout/layout_admin') ?>

<?= $this->section('content') ?>

<style>
.menu-card {
    border-radius: 16px;
    padding: 30px 20px;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: 0.25s;
    text-align: center;
}
.menu-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}
.menu-card i {
    font-size: 50px;
    margin-bottom: 12px;
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
    padding: 6px 22px;
}
.btn-go:hover {
    background-color: #3b34c4;
}
</style>

<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Selamat Datang, <?= esc($username) ?> 👋</h2>
        <p class="text-muted">Kelola sistem di sini.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Kelola Akun -->
        <div class="col-md-4">
            <div class="menu-card h-100">
                <i class="bi bi-people-fill"></i>
                <h5>Kelola Akun</h5>
                <p>Tambah dan atur akun pengguna.</p>
                <a href="<?= base_url('dashboard/admin/kelola-akun') ?>" class="btn btn-go mt-2">Masuk</a>
            </div>
        </div>

        <!-- Kelola Forum -->
        <div class="col-md-4">
            <div class="menu-card h-100">
                <i class="bi bi-chat-text"></i>
                <h5>Kelola Forum</h5>
                <p>Atur topik dan komentar forum.</p>
                <a href="<?= base_url('dashboard/admin/kelola-forum') ?>" class="btn btn-go mt-2">Masuk</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
