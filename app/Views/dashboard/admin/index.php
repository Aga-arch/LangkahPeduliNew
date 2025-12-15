<?= $this->extend('layout/layout_admin') ?>

<?= $this->section('content') ?>

<style>
    /* === 1. WELCOME BANNER === */
    .welcome-banner {
        background: linear-gradient(135deg, #0d47a1 0%, #42a5f5 100%);
        border-radius: 20px;
        padding: 40px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(13, 71, 161, 0.3);
        margin-bottom: 30px;
    }
    
    .welcome-banner h2 { font-weight: 700; margin-bottom: 10px; font-size: 1.8rem; }
    .welcome-banner p { font-size: 1rem; opacity: 0.9; margin: 0; }
    
    /* Dekorasi Lingkaran */
    .circle-deco {
        position: absolute; border-radius: 50%; background: rgba(255,255,255,0.1); z-index: 1;
    }
    .c1 { width: 150px; height: 150px; top: -30px; right: -30px; }
    .c2 { width: 100px; height: 100px; bottom: 20px; right: 80px; }
    .c3 { width: 60px; height: 60px; top: 20px; right: 200px; opacity: 0.5;}

    /* === 2. STATS CARDS === */
    .stat-card {
        background: white; border-radius: 16px; padding: 25px;
        border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: 0.3s; position: relative; overflow: hidden; height: 100%;
    }
    .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    
    .icon-box {
        width: 50px; height: 50px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px; margin-bottom: 15px;
    }
    .bg-blue-light { background: #e3f2fd; color: #1565c0; }
    .bg-indigo-light { background: #e8eaf6; color: #3949ab; }
    
    .stat-title { color: #6c757d; font-size: 0.9rem; font-weight: 500; }
    .stat-value { font-size: 1.8rem; font-weight: 700; color: #333; margin-top: 5px; display: block; }

    /* === 3. GRADIENT CARDS (MENU UTAMA) === */
    .section-title { font-weight: 700; color: #444; margin-bottom: 20px; border-left: 5px solid #1976d2; padding-left: 15px; }

    .gradient-card {
        background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
        border-radius: 20px;
        padding: 30px;
        color: white;
        transition: 0.3s;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(21, 101, 192, 0.3);
        height: 100%;
        display: flex; flex-direction: column; justify-content: space-between;
    }

    .gradient-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 15px 35px rgba(21, 101, 192, 0.4);
    }

    .bg-icon {
        position: absolute; right: -20px; bottom: -20px;
        font-size: 100px; color: rgba(255,255,255,0.1);
        transform: rotate(-15deg); transition: 0.3s;
    }
    .gradient-card:hover .bg-icon { transform: rotate(0deg) scale(1.1); right: -10px; bottom: -10px; }

    .card-title-lg { font-size: 1.4rem; font-weight: 700; margin-bottom: 5px; position: relative; z-index: 2; }
    .card-desc { font-size: 0.9rem; opacity: 0.9; margin-bottom: 20px; position: relative; z-index: 2; max-width: 80%; }
    
    .btn-white-glass {
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255,255,255,0.3);
        color: white; padding: 8px 20px; border-radius: 50px;
        font-size: 0.85rem; font-weight: 600; text-decoration: none;
        display: inline-flex; align-items: center; width: fit-content;
        position: relative; z-index: 2; transition: 0.3s;
    }
    .gradient-card:hover .btn-white-glass { background: white; color: #1565c0; }
</style>

<div class="container-fluid py-2">

    <div class="welcome-banner">
        <div class="circle-deco c1"></div>
        <div class="circle-deco c2"></div>
        <div class="circle-deco c3"></div>
        
        <div class="position-relative" style="z-index: 2;">
            <h2>Halo, <?= esc($username ?? 'Admin') ?>! 👋</h2>
            <p>Selamat datang di Panel Admin Langkah Peduli. Kelola sistem dengan mudah di sini.</p>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="stat-title">Total Pengguna</span>
                        <span class="stat-value"><?= esc($total_users ?? 0) ?></span>
                    </div>
                    <div class="icon-box bg-blue-light"><i class="bi bi-people-fill"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="stat-title">Total Topik Forum</span>
                        <span class="stat-value"><?= esc($total_forum ?? 0) ?></span>
                    </div>
                    <div class="icon-box bg-indigo-light"><i class="bi bi-chat-text-fill"></i></div>
                </div>
            </div>
        </div>
    </div>

    <h5 class="section-title">Menu Manajemen</h5>
    <div class="row g-4">
        
        <div class="col-md-6">
            <div class="gradient-card" onclick="window.location='<?= base_url('dashboard/admin/kelola-akun') ?>'">
                <i class="bi bi-person-gear bg-icon"></i>
                
                <div>
                    <div class="card-title-lg">Kelola Akun</div>
                    <p class="card-desc">Manajemen data pengguna, pengajar, dan admin sistem.</p>
                </div>
                
                <div class="btn-white-glass">
                    Akses Menu <i class="bi bi-arrow-right ms-2"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="gradient-card" onclick="window.location='<?= base_url('dashboard/admin/kelola-forum') ?>'">
                <i class="bi bi-chat-text-fill bg-icon"></i>
                
                <div>
                    <div class="card-title-lg">Kelola Forum</div>
                    <p class="card-desc">Moderasi diskusi, hapus spam, dan pantau interaksi.</p>
                </div>
                
                <div class="btn-white-glass">
                    Akses Menu <i class="bi bi-arrow-right ms-2"></i>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>