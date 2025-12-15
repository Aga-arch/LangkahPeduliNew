<?= $this->extend('layout/layout_penerima') ?>
<?= $this->section('content') ?>

<style>
    /* === HEADER PENJELASAN === */
    .reward-header {
        text-align: center; margin-bottom: 50px;
    }
    .reward-title {
        font-weight: 800; color: #1e293b; font-size: 2rem;
        background: -webkit-linear-gradient(45deg, #f59e0b, #d97706);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    .reward-subtitle { color: #64748b; max-width: 600px; margin: 10px auto; font-size: 1rem; }

    /* === REWARD CARD MODERN === */
    .reward-card {
        background: white; border-radius: 20px;
        padding: 40px 30px; text-align: center;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%; position: relative; overflow: hidden;
    }

    .reward-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    /* Efek Kilau di Background */
    .card-glow {
        position: absolute; top: -50px; right: -50px;
        width: 150px; height: 150px;
        background: radial-gradient(circle, rgba(253, 224, 71, 0.2) 0%, rgba(255,255,255,0) 70%);
        border-radius: 50%; opacity: 0; transition: 0.5s;
    }
    .reward-card:hover .card-glow { opacity: 1; transform: scale(1.2); }

    /* Ikon Piala */
    .icon-wrapper {
        width: 90px; height: 90px; margin: 0 auto 25px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 40px; position: relative; z-index: 2;
        background: #fffbeb; color: #d97706; /* Default Gold */
        box-shadow: 0 8px 20px rgba(217, 119, 6, 0.15);
        transition: 0.3s;
    }
    
    .reward-card:hover .icon-wrapper { transform: scale(1.1) rotate(10deg); }

    /* Variasi Warna Ikon */
    .icon-blue { background: #eff6ff; color: #2563eb; box-shadow: 0 8px 20px rgba(37, 99, 235, 0.15); }
    .icon-purple { background: #f3e8ff; color: #9333ea; box-shadow: 0 8px 20px rgba(147, 51, 234, 0.15); }

    .reward-name { font-weight: 700; color: #334155; margin-bottom: 10px; font-size: 1.15rem; }
    .reward-desc { color: #94a3b8; font-size: 0.9rem; line-height: 1.6; }

    /* Label Status (Opsional: Jika badge terkunci/terbuka) */
    .status-badge {
        display: inline-block; padding: 4px 12px; border-radius: 20px;
        font-size: 0.75rem; font-weight: 600; text-transform: uppercase;
        margin-top: 20px; background: #dcfce7; color: #166534;
    }
</style>

<div class="container-fluid py-2">

    <div class="reward-header">
        <h2 class="reward-title">Pencapaian Saya</h2>
        <p class="reward-subtitle">
            Kumpulkan lencana dengan menyelesaikan quiz, aktif di forum, dan membantu sesama teman belajar.
        </p>
    </div>

    <div class="row g-4 justify-content-center">
        
        <div class="col-md-6 col-lg-4">
            <div class="reward-card">
                <div class="card-glow"></div>
                
                <div class="icon-wrapper">
                    <i class="bi bi-award-fill"></i>
                </div>
                
                <h5 class="reward-name">Pembelajar Aktif</h5>
                <p class="reward-desc">
                    Penghargaan konsistensi. Diberikan kepada pengguna yang berhasil menyelesaikan 3 quiz berturut-turut tanpa gagal.
                </p>
                <span class="status-badge">Telah Diraih</span>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="reward-card">
                <div class="card-glow" style="background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, rgba(255,255,255,0) 70%);"></div>
                
                <div class="icon-wrapper icon-blue">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                
                <h5 class="reward-name">Top Quiz Performer</h5>
                <p class="reward-desc">
                    Lambang kecerdasan. Diraih karena berhasil mendapatkan nilai rata-rata di atas 90% dalam semua quiz mingguan.
                </p>
                <span class="status-badge">Telah Diraih</span>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="reward-card">
                <div class="card-glow" style="background: radial-gradient(circle, rgba(168, 85, 247, 0.2) 0%, rgba(255,255,255,0) 70%);"></div>
                
                <div class="icon-wrapper icon-purple">
                    <i class="bi bi-star-fill"></i>
                </div>
                
                <h5 class="reward-name">Mentor’s Choice</h5>
                <p class="reward-desc">
                    Penghargaan sosial. Diberikan khusus oleh pengajar untuk peserta yang paling aktif membantu di forum diskusi.
                </p>
                <span class="status-badge">Telah Diraih</span>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>