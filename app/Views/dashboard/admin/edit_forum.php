<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .form-card {
        background: white; border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.02);
        max-width: 800px; margin: 0 auto; padding: 30px;
    }
    .form-label { font-weight: 600; color: #334155; margin-bottom: 8px; }
    .form-control, .form-select { border-radius: 10px; padding: 12px 15px; border: 1px solid #e2e8f0; }
    .form-control:focus { border-color: #1976d2; box-shadow: 0 0 0 4px rgba(25, 118, 210, 0.1); }
    
    .btn-simpan {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        border: none; border-radius: 50px; padding: 12px 30px;
        font-weight: 600; color: white; transition: 0.3s;
    }
    .btn-simpan:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(217, 119, 6, 0.3); color: white; }

    .btn-batal {
        background: #f1f5f9; color: #64748b; border: none;
        border-radius: 50px; padding: 12px 30px; font-weight: 600; margin-right: 10px;
    }

    /* Preview Gambar */
    .current-img {
        width: 100%; height: 200px; object-fit: cover; border-radius: 10px;
        margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
</style>

<div class="container-fluid py-4">

    <div class="d-flex align-items-center mb-4 justify-content-center" style="max-width: 800px; margin: 0 auto;">
        <div class="w-100">
            <h4 class="fw-bold mb-1 text-dark">Edit Forum</h4>
            <p class="text-muted small mb-0">Perbarui informasi topik diskusi.</p>
        </div>
    </div>

    <div class="form-card">
        <form method="post" action="<?= base_url('dashboard/admin/update-forum/' . $forum['id']) ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <input type="hidden" name="gambarLama" value="<?= $forum['gambar'] ?>">

            <div class="mb-4">
                <label class="form-label">Judul Forum</label>
                <input type="text" name="judul" class="form-control" value="<?= esc($forum['judul']) ?>" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Status Forum</label>
                <select name="status" class="form-select" required>
                    <option value="aktif" <?= $forum['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="tutup" <?= $forum['status'] == 'tutup' ? 'selected' : '' ?>>Ditutup</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Isi Forum</label>
                <textarea id="konten" name="konten" required><?= $forum['isi'] ?? $forum['deskripsi'] ?? $forum['konten'] ?></textarea>
            </div>

            <div class="mb-5">
                <label class="form-label">Gambar Sampul</label>
                
                <div class="row">
                    <div class="col-md-4">
                        <p class="small text-muted mb-1">Gambar Saat Ini:</p>
                        <?php if($forum['gambar']): ?>
                            <img src="<?= base_url('uploads/forum/' . $forum['gambar']) ?>" class="current-img">
                        <?php else: ?>
                            <div class="alert alert-secondary py-2 small">Tidak ada gambar</div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <p class="small text-muted mb-1">Ganti Gambar (Opsional):</p>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted d-block mt-2">*Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="<?= base_url('dashboard/admin/kelola-forum') ?>" class="btn btn-batal">Batal</a>
                <button type="submit" class="btn btn-simpan">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
<script>
    $('#konten').summernote({
        placeholder: 'Edit konten forum...',
        tabsize: 2,
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
</script>

<?= $this->endSection() ?>