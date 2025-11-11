<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<style>
    .reward-card {
        border-radius: 18px;
        background: white;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        padding: 25px;
        text-align: center;
        transition: 0.3s;
    }
    .reward-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
    }
    .reward-card i {
        font-size: 50px;
        color: #facc15;
        margin-bottom: 10px;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Penghargaan Saya 🏅</h2>
        <p class="text-muted">Lihat pencapaian dan penghargaan yang telah kamu raih selama belajar di Langkah Peduli.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="reward-card">
                <i class="bi bi-award"></i>
                <h5>Badge Pembelajar Aktif</h5>
                <p class="text-muted">Diberikan kepada pengguna yang menyelesaikan 3 quiz berturut-turut.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="reward-card">
                <i class="bi bi-trophy"></i>
                <h5>Top Quiz Performer</h5>
                <p class="text-muted">Diraih atas nilai rata-rata di atas 90% dalam semua quiz.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="reward-card">
                <i class="bi bi-star"></i>
                <h5>Mentor’s Choice</h5>
                <p class="text-muted">Penghargaan khusus dari pengajar untuk peserta paling aktif di forum.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
