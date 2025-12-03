<?= $this->extend('layout/layout_penerima') ?> 
<?= $this->section('content') ?> 

<style> 
.materi-title { font-size: 28px; font-weight: 800; color: #2C4E80; } 
.materi-meta { color: #6c757d; font-size: 15px; margin-bottom: 15px; } 
.materi-card { background: #ffffff; border-radius: 14px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.06); border: 1px solid #e9ecef; font-size: 17px; line-height: 1.8; color: #333; white-space: normal; } 
.materi-card img { max-width: 100%; border-radius: 10px; margin-top: 15px; margin-bottom: 15px; } 
.materi-card p { margin-bottom: 12px; } 
.btn-download { padding: 10px 16px; font-weight: 600; border-radius: 10px; } 
.fade-in { animation: fadeIn .4s ease-in-out; } 
@keyframes fadeIn { 
    from { opacity: 0; transform: translateY(10px); } 
    to { opacity: 1; transform: translateY(0); } 
} 
</style> 

<div class="container mt-4 fade-in">

<!-- Judul Materi -->
<h3 class="materi-title">
    <?= esc($materi['judul_materi']) ?>
</h3>

<!-- Info Pengajar -->
<p class="materi-meta">
    👨‍🏫 Pengajar: <strong><?= esc($materi['pengajar']) ?></strong><br>
    📅 Dibuat: <?= date('d M Y', strtotime($materi['created_at'])) ?>
</p>

<!-- Isi materi -->
<div class="materi-card">
    <?= $materi['isi_materi'] ?>
</div>

<!-- Tombol Download File -->
<?php if (!empty($materi['file'])): ?>
    <a href="<?= base_url('uploads/materi/' . $materi['file']) ?>" 
       class="btn btn-primary btn-download mt-3" 
       download>
       📥 Download File Materi
    </a>
<?php endif; ?>

</div> 

<?= $this->endSection() ?>
