<?= $this->extend('layout/layout_penerima') ?>

<?= $this->section('content') ?>

<?php
// LOGIKA TAMBAHAN:
// Cek apakah halaman ini dibuka hasil pencarian atau daftar biasa
$isSearch = isset($keyword) && !empty($keyword);
$dataMapel = $isSearch ? $mapel : (isset($mapel) ? $mapel : []); // Pastikan variabel data aman
?>

<style>
    /* Styling Dasar */
    body { background-color: #f8fafc; }

    /* Header Welcome (Untuk Tampilan Biasa) */
    .welcome-section {
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        color: white;
        border-radius: 18px;
        padding: 50px 25px;
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.3);
        margin-bottom: 40px;
    }

    /* Header Pencarian (Untuk Tampilan Hasil Cari) */
    .search-header {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: white;
        border-radius: 18px;
        padding: 40px 25px;
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        margin-bottom: 40px;
    }

    /* Kartu Materi/Mapel */
    .result-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease-in-out;
        background: white;
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .result-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .result-banner {
        height: 120px;
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 36px;
        position: relative;
    }

    /* Badge Label */
    .badge-kategori {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255, 255, 255, 0.9);
        color: #4f46e5;
        padding: 5px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 11px;
        text-transform: uppercase;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .result-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .result-title {
        color: #4f46e5;
        font-weight: 700;
        font-size: 18px;
        margin-bottom: 5px;
        line-height: 1.3;
    }

    .result-pengajar {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 15px;
    }

    .btn-detail {
        background-color: #4f46e5;
        color: white;
        border-radius: 50px;
        padding: 8px 25px;
        font-size: 14px;
        font-weight: 500;
        margin-top: auto;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease-in-out;
        text-decoration: none;
        display: inline-block;
    }

    .result-card:hover .btn-detail {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<div class="container py-4">

    <?php if ($isSearch): ?>
        
        <div class="search-header text-center">
            <h2 class="fw-bold mb-2">Hasil Pencarian</h2>
            <p class="mb-0">
                Menampilkan hasil untuk kata kunci: 
                <span style="background: rgba(255,255,255,0.2); padding: 2px 10px; border-radius: 5px; font-weight: bold;">
                    "<?= esc($keyword) ?>"
                </span>
            </p>
            <a href="<?= base_url('dashboard/penerima/mapel') ?>" class="btn btn-sm btn-outline-light mt-3 rounded-pill">
                Reset Pencarian
            </a>
        </div>

    <?php else: ?>

        <div class="welcome-section text-center">
            <h2 class="fw-bold mb-2">Selamat Datang, <?= esc($username ?? 'Pengguna') ?> 👋</h2>
            <p>Pilih mata pelajaran di bawah untuk mulai belajar.</p>
        </div>
        <h4 class="fw-bold text-center mb-4 text-primary">Daftar Mata Pelajaran</h4>

    <?php endif; ?>


    <div class="row g-4">
        <?php if (!empty($dataMapel)): ?>
            <?php foreach ($dataMapel as $m): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    
                    <div class="card result-card">
                        
                        <div class="result-banner">
                            <?php if (isset($m['nama_kategori'])): ?>
                                <span class="badge-kategori">
                                    <i class="bi bi-tag-fill me-1"></i> <?= esc($m['nama_kategori']) ?>
                                </span>
                            <?php endif; ?>
                            
                            <i class="bi bi-journal-text"></i>
                        </div>

                        <div class="result-body text-center">
                            
                            <div class="result-title">
                                <?= esc($m['judul_materi'] ?? $m['nama_kategori'] ?? 'Tanpa Judul') ?>
                            </div>

                            <?php if (isset($m['pengajar'])): ?>
                                <div class="result-pengajar">
                                    <i class="bi bi-person-circle"></i> <?= esc($m['pengajar']) ?>
                                </div>
                            <?php endif; ?>

                            <div>
                                <?php 
                                    $link = $isSearch 
                                        ? base_url('dashboard/penerima/materi/' . ($m['id'] ?? '#')) 
                                        : base_url('dashboard/penerima/mapel/' . ($m['id'] ?? '#'));
                                    
                                    $label = $isSearch ? "Baca Materi" : "Lihat Mapel";
                                ?>

                                <a href="<?= $link ?>" class="btn btn-detail">
                                   <?= $label ?>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            <?php endforeach; ?>

        <?php else: ?>
            
            <div class="col-12 text-center py-5">
                <i class="bi bi-search" style="font-size: 50px; color: #cbd5e1; display: block; margin-bottom: 20px;"></i>
                <h4 class="text-secondary">Data tidak ditemukan</h4>
                <?php if ($isSearch): ?>
                    <p class="text-muted">Coba gunakan kata kunci lain.</p>
                <?php else: ?>
                    <p class="text-muted">Belum ada mata pelajaran tersedia.</p>
                <?php endif; ?>
            </div>

        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>