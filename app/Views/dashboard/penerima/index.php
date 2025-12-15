<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>

<style>
    /* === 1. WELCOME BANNER (SAMA SEPERTI ADMIN) === */
    .welcome-banner {
        background: linear-gradient(135deg, #0d47a1 0%, #1976d2 100%);
        border-radius: 20px;
        padding: 40px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(13, 71, 161, 0.3);
        margin-bottom: 40px;
    }
    
    .welcome-banner h2 { font-weight: 700; margin-bottom: 10px; font-size: 1.8rem; }
    .welcome-banner p { font-size: 1rem; opacity: 0.9; margin: 0; }
    
    /* Dekorasi Lingkaran */
    .circle-deco { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.1); z-index: 1; }
    .c1 { width: 150px; height: 150px; top: -30px; right: -30px; }
    .c2 { width: 100px; height: 100px; bottom: 20px; right: 80px; }

    /* === 2. MENU CARDS (STYLE BARU) === */
    .menu-card {
        background: white;
        border-radius: 20px;
        padding: 35px 25px;
        text-align: center;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        height: 100%;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        position: relative; overflow: hidden;
    }

    .menu-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        border-color: #1976d2;
    }

    /* Lingkaran Ikon */
    .icon-circle {
        width: 80px; height: 80px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #1976d2;
        display: flex; align-items: center; justify-content: center;
        font-size: 32px; margin-bottom: 20px;
        transition: 0.3s;
    }

    /* Efek Hover pada Ikon */
    .menu-card:hover .icon-circle {
        background: #1976d2; color: white;
        transform: scale(1.1) rotate(5deg);
    }

    .menu-title { font-weight: 700; color: #334155; margin-bottom: 10px; font-size: 1.1rem; }
    .menu-desc { color: #64748b; font-size: 0.9rem; line-height: 1.5; margin-bottom: 20px; }

    /* Tombol Palsu (Visual Saja) */
    .btn-arrow {
        width: 40px; height: 40px; border-radius: 50%;
        background: #f8fafc; color: #1976d2;
        display: flex; align-items: center; justify-content: center;
        transition: 0.3s; margin-top: auto;
    }
    .menu-card:hover .btn-arrow { background: #e3f2fd; transform: translateX(5px); }
</style>

<div class="container-fluid py-2">

    <div class="welcome-banner">
        <div class="circle-deco c1"></div>
        <div class="circle-deco c2"></div>
        
        <div class="position-relative" style="z-index: 2;">
            <h2>Selamat Datang, <?= esc($username) ?>! 👋</h2>
            <p>Siap untuk belajar hal baru hari ini? Pilih menu di bawah untuk memulai.</p>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-12 col-md-6 col-lg-3">
            <div class="menu-card" onclick="window.location='<?= base_url('dashboard/penerima/mapel') ?>'">
                <div class="icon-circle">
                    <i class="bi bi-journal-album"></i>
                </div>
                <h5 class="menu-title">Mata Pelajaran</h5>
                <p class="menu-desc">Akses modul, video pembelajaran, dan materi materi terbaru.</p>
                <div class="btn-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="menu-card" onclick="window.location='<?= base_url('dashboard/penerima/quiz') ?>'">
                <div class="icon-circle">
                    <i class="bi bi-controller"></i>
                </div>
                <h5 class="menu-title">Quiz & Latihan</h5>
                <p class="menu-desc">Uji kemampuanmu dengan mengerjakan soal-soal latihan.</p>
                <div class="btn-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="menu-card" onclick="window.location='<?= base_url('dashboard/forum') ?>'">
                <div class="icon-circle">
                    <i class="bi bi-chat-quote-fill"></i>
                </div>
                <h5 class="menu-title">Forum Diskusi</h5>
                <p class="menu-desc">Tanya jawab dengan pengajar dan diskusi bersama teman.</p>
                <div class="btn-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="menu-card" onclick="window.location='<?= base_url('dashboard/penerima/penghargaan') ?>'">
                <div class="icon-circle">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <h5 class="menu-title">Penghargaan</h5>
                <p class="menu-desc">Lihat koleksi badge dan sertifikat pencapaianmu.</p>
                <div class="btn-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>