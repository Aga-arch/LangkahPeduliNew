<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h3 class="fw-bold header-gradient mb-3">Detail Materi</h3>

    <?php if(!empty($materi)): ?>
        <div class="card glass-card shadow-lg p-4">
            <h4 class="mb-3"><?= esc($materi['judul_materi']) ?></h4>
            <p><strong>Kategori:</strong> <?= esc($materi['nama_kategori']) ?></p>
            <p><strong>Pengajar:</strong> <?= esc($materi['pengajar']) ?></p>
            <p><strong>Tanggal Dibuat:</strong> <?= esc($materi['created_at']) ?></p>
            <hr>
            <div class="materi-content">
                <!-- Menampilkan isi materi dengan HTML aktif -->
                <?= $materi['isi_materi'] ?>
            </div>
        </div>

        <div class="mt-3">
            <a href="<?= base_url('dashboard/pengajar/materi') ?>" class="btn btn-gradient btn-hover">
                <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Materi
            </a>

            <?php if($materi['pengajar'] == session()->get('username')): ?>
                <a href="<?= base_url('dashboard/pengajar/materi/edit/'.$materi['id']) ?>" class="btn btn-primary btn-hover">
                    <i class="bi bi-pencil-square"></i> Edit Materi
                </a>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">Materi tidak ditemukan.</div>
        <a href="<?= base_url('dashboard/pengajar/materi') ?>" class="btn btn-gradient btn-hover">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    <?php endif; ?>
</div>

<style>
.glass-card { 
    background: rgba(255,255,255,0.9); 
    backdrop-filter: blur(12px); 
    border-radius:1rem; 
    border:1px solid rgba(0,123,255,0.15);
}
.materi-content { line-height:1.7; font-size:1rem; }
.header-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);-webkit-background-clip:text;color:transparent;}
.btn-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);color:#fff;font-weight:600;border:none;transition:all 0.3s ease;}
.btn-gradient:hover{transform: translateY(-2px);box-shadow:0 6px 15px rgba(0,123,255,0.3);}
.btn-hover{transition:all 0.3s ease;}
.btn-primary{transition:all 0.3s ease;}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 6px 15px rgba(0,123,255,0.3);}
</style>

<?= $this->endSection() ?>
