<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-body text-center p-4">
            <i class="bi bi-person-circle text-primary" style="font-size: 4rem;"></i>
            <h4 class="mt-3 fw-bold"><?= esc($profil['nama']) ?></h4>
            <p class="text-muted"><?= esc($profil['email']) ?></p>
            <hr>
            <p><strong>Tanggal Bergabung:</strong> <?= esc($profil['tanggal_gabung']) ?></p>
            <p><strong>Jam Login Terakhir:</strong> <?= esc($profil['jam_login_terakhir']) ?></p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
