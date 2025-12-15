<?= $this->extend('layout/layout_admin') ?>

<?= $this->section('content') ?>

<style>
    /* === PROFILE CARD DESIGN === */
    .profile-card {
        background: white;
        border-radius: 20px;
        overflow: hidden; /* Agar header tidak keluar border */
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.02);
        max-width: 600px;
        margin: 0 auto;
        position: relative;
    }

    /* Bagian Atas (Header Biru) */
    .profile-header {
        height: 140px;
        background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
        position: relative;
    }
    
    /* Dekorasi Header */
    .header-shape {
        position: absolute; bottom: 0; left: 0; width: 100%; height: 40px;
        background: white;
        border-radius: 30px 30px 0 0; /* Membuat lengkungan perbatasan */
    }

    /* Foto/Ikon Profil */
    .avatar-wrapper {
        position: relative;
        margin-top: -70px; /* Menarik ke atas masuk ke header */
        text-align: center;
        margin-bottom: 15px;
    }

    .avatar-box {
        width: 110px; height: 110px;
        background: white;
        border-radius: 50%;
        padding: 5px;
        display: inline-flex;
        align-items: center; justify-content: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .avatar-inner {
        width: 100%; height: 100%;
        background: #f1f5f9;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 50px; color: #64748b;
    }

    /* Teks Nama & Role */
    .profile-name { font-size: 1.5rem; font-weight: 700; color: #334155; margin-bottom: 5px; }
    .profile-role-badge {
        padding: 6px 18px; border-radius: 50px; font-size: 0.85rem; font-weight: 600;
        text-transform: uppercase; letter-spacing: 0.5px; display: inline-block;
    }
    
    /* Warna Badge Role */
    .bg-role-admin { background: #e0f2fe; color: #0284c7; }
    .bg-role-pengajar { background: #dcfce7; color: #16a34a; }
    .bg-role-penerima { background: #f3e8ff; color: #9333ea; }

    /* Bagian Detail Info */
    .info-section { padding: 20px 40px 40px; }
    
    .info-item {
        display: flex; align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #f1f5f9;
    }
    .info-item:last-child { border-bottom: none; }
    
    .info-icon {
        width: 40px; height: 40px; background: #f8fafc;
        color: #64748b; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px; margin-right: 15px;
    }
    
    .info-label { font-size: 0.85rem; color: #94a3b8; font-weight: 500; display: block; }
    .info-value { font-size: 1rem; color: #334155; font-weight: 600; }

    /* Tombol Kembali */
    .btn-back-custom {
        display: inline-flex; align-items: center; gap: 8px;
        background: #f1f5f9; color: #475569;
        padding: 10px 25px; border-radius: 12px;
        text-decoration: none; font-weight: 600; transition: 0.3s;
        border: 1px solid transparent;
    }
    .btn-back-custom:hover {
        background: #e2e8f0; color: #1e293b; transform: translateX(-3px);
    }
</style>

<div class="container-fluid py-4">

    <div class="d-flex align-items-center mb-4">
        <a href="<?= base_url('dashboard/admin/kelola-akun') ?>" class="btn btn-sm btn-light rounded-circle shadow-sm me-3">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h4 class="fw-bold mb-0 text-dark">Detail Akun</h4>
    </div>

    <?php
        $roleClass = 'bg-light text-secondary';
        $iconRole  = 'bi-person';

        if ($user['role'] == 'admin') {
            $roleClass = 'bg-role-admin';
            $iconRole = 'bi-shield-lock';
        } elseif ($user['role'] == 'pengajar') {
            $roleClass = 'bg-role-pengajar';
            $iconRole = 'bi-briefcase';
        } elseif ($user['role'] == 'penerima' || $user['role'] == 'siswa') {
            $roleClass = 'bg-role-penerima';
            $iconRole = 'bi-backpack';
        }
    ?>

    <div class="profile-card">
        
        <div class="profile-header">
            <div class="header-shape"></div>
        </div>

        <div class="avatar-wrapper">
            <div class="avatar-box">
                <div class="avatar-inner">
                    <i class="bi <?= $iconRole ?>"></i>
                </div>
            </div>
            
            <h3 class="profile-name"><?= esc($user['username']) ?></h3>
            
            <span class="profile-role-badge <?= $roleClass ?>">
                <?= esc($user['role']) ?>
            </span>
        </div>

        <div class="info-section">
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="bi bi-hash"></i>
                </div>
                <div>
                    <span class="info-label">User ID</span>
                    <span class="info-value">#<?= esc($user['id']) ?></span>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="bi bi-envelope"></i>
                </div>
                <div>
                    <span class="info-label">Alamat Email</span>
                    <span class="info-value"><?= esc($user['email']) ?></span>
                </div>
            </div>

            <?php if(isset($user['created_at'])): ?>
            <div class="info-item">
                <div class="info-icon">
                    <i class="bi bi-calendar3"></i>
                </div>
                <div>
                    <span class="info-label">Bergabung Sejak</span>
                    <span class="info-value"><?= date('d F Y', strtotime($user['created_at'])) ?></span>
                </div>
            </div>
            <?php endif; ?>

            <div class="text-center mt-4 pt-2">
                <a href="<?= base_url('dashboard/admin/kelola-akun') ?>" class="btn-back-custom">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>