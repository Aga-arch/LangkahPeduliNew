<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<style>
    /* === HEADER TOOLS === */
    .page-header {
        display: flex; justify-content: space-between; align-items: center;
        flex-wrap: wrap; gap: 15px; margin-bottom: 30px;
    }
    
    /* === USER CARD MODERN === */
    .user-card {
        background: white; border-radius: 20px; overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.02);
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative; height: 100%;
        display: flex; flex-direction: column; align-items: center;
    }
    
    .user-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }

    /* Header Card (Gradient) */
    .card-header-bg {
        height: 80px; width: 100%;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        margin-bottom: -40px; /* Agar foto naik ke atas */
    }

    /* Foto Profil */
    .user-photo {
        width: 80px; height: 80px; border-radius: 50%;
        background: white; padding: 5px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        z-index: 2; position: relative;
    }
    .user-photo-inner {
        width: 100%; height: 100%; border-radius: 50%;
        background: #f1f5f9; display: flex; align-items: center; justify-content: center;
        color: #64748b; font-size: 35px; overflow: hidden;
    }
    
    .card-body {
        padding: 15px 20px 25px; text-align: center; width: 100%;
    }

    .user-name { font-weight: 700; color: #334155; font-size: 1.1rem; margin-bottom: 2px; }
    .user-email { color: #94a3b8; font-size: 0.85rem; margin-bottom: 15px; display: block; }

    /* Badge Role Dinamis */
    .badge-role {
        padding: 6px 16px; border-radius: 50px; font-size: 0.75rem; font-weight: 600;
        text-transform: uppercase; letter-spacing: 0.5px; display: inline-block;
    }
    .role-admin { background: #e0f2fe; color: #0284c7; }   /* Biru Langit */
    .role-pengajar { background: #dcfce7; color: #16a34a; } /* Hijau */
    .role-penerima { background: #f3e8ff; color: #9333ea; } /* Ungu */
    .role-default { background: #f1f5f9; color: #64748b; }  /* Abu */

    /* Action Buttons */
    .action-group {
        margin-top: 20px; padding-top: 20px; border-top: 1px solid #f1f5f9;
        display: flex; justify-content: center; gap: 10px; width: 100%;
    }
    
    .btn-icon {
        width: 38px; height: 38px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        transition: 0.2s; border: none; font-size: 16px;
    }
    
    .btn-view { background: #eef2ff; color: #4f46e5; }
    .btn-view:hover { background: #4f46e5; color: white; }
    
    .btn-delete { background: #fff1f2; color: #e11d48; }
    .btn-delete:hover { background: #e11d48; color: white; }

</style>

<div class="container-fluid py-2">

    <div class="page-header">
        <div>
            <h3 class="fw-bold mb-1" style="color: #1e293b;">Kelola Akun Pengguna</h3>
            <p class="text-muted mb-0">Total Pengguna Terdaftar: <?= count($users) ?></p>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                
                <?php 
                    // Logika Warna Badge Berdasarkan Role
                    $roleClass = 'role-default';
                    $roleIcon  = 'bi-person';
                    
                    if($user['role'] == 'admin') { 
                        $roleClass = 'role-admin'; 
                        $roleIcon = 'bi-shield-lock-fill';
                    } 
                    elseif($user['role'] == 'pengajar') { 
                        $roleClass = 'role-pengajar'; 
                        $roleIcon = 'bi-briefcase-fill';
                    } 
                    elseif($user['role'] == 'penerima' || $user['role'] == 'siswa') { 
                        $roleClass = 'role-penerima'; 
                        $roleIcon = 'bi-backpack-fill';
                    }
                ?>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="user-card">
                        
                        <div class="card-header-bg"></div>

                        <div class="user-photo">
                            <div class="user-photo-inner">
                                <i class="bi <?= $roleIcon ?>"></i>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="user-name"><?= esc($user['username']) ?></div>
                            <span class="user-email"><?= esc($user['email']) ?></span>

                            <span class="badge-role <?= $roleClass ?>">
                                <?= esc($user['role']) ?>
                            </span>

                            <div class="action-group">
                                <a href="<?= base_url('dashboard/admin/detail-akun/'.$user['id']) ?>" 
                                   class="btn-icon btn-view" title="Lihat Detail">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="<?= base_url('dashboard/admin/delete-akun/'.$user['id']) ?>"
                                   onclick="return confirm('Hapus pengguna <?= esc($user['username']) ?>?')" 
                                   class="btn-icon btn-delete" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            
            <div class="col-12 text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-people display-1 text-light"></i>
                </div>
                <h5 class="text-muted">Belum ada data pengguna.</h5>
            </div>

        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>