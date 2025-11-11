<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>
<style>
    .profile-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 40px;
        max-width: 700px;
        margin: 0 auto;
        transition: 0.3s;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .profile-header img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
    }

    .profile-header h3 {
        margin-top: 15px;
        font-weight: 600;
        color: #333;
    }

    .profile-header p {
        color: #6c757d;
    }

    .profile-info .info-label {
        font-weight: 600;
        color: #4f46e5;
    }

    .btn-edit {
        border-radius: 50px;
        background-color: #4f46e5;
        color: white;
        font-weight: 500;
        padding: 8px 25px;
    }

    .btn-edit:hover {
        background-color: #3730a3;
    }
</style>

<div class="container py-5">
    <div class="profile-card">
        <div class="profile-header">
            <img src="https://cdn-icons-png.flaticon.com/512/219/219970.png" alt="Foto Profil">
            <h3><?= esc(session()->get('username')) ?></h3>
            <p class="text-muted"><?= esc(session()->get('email') ?? 'Email tidak tersedia') ?></p>
        </div>

        <div class="profile-info">
            <div class="row mb-3">
                <div class="col-4 info-label">Nama Lengkap</div>
                <div class="col-8"><?= esc(session()->get('username')) ?></div>
            </div>

            <div class="row mb-3">
                <div class="col-4 info-label">Email</div>
                <div class="col-8"><?= esc(session()->get('email') ?? '-') ?></div>
            </div>

            <div class="row mb-3">
                <div class="col-4 info-label">Peran</div>
                <div class="col-8"><?= ucfirst(esc(session()->get('role') ?? 'Penerima')) ?></div>
            </div>

            <div class="row mb-4">
                <div class="col-4 info-label">Tanggal Gabung</div>
                <div class="col-8"><?= esc(session()->get('tanggal_gabung') ?? 'Tidak diketahui') ?></div>
            </div>
        </div>

        <div class="text-center">
            <a href="<?= base_url('dashboard/profil/edit') ?>" class="btn btn-edit">Edit Profil</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
