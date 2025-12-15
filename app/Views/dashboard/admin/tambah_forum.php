<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    /* === FORM CARD DESIGN === */
    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.02);
        max-width: 800px; /* Batasi lebar agar enak dilihat */
        margin: 0 auto;
        padding: 30px;
    }

    /* Style Input Modern */
    .form-label {
        font-weight: 600; color: #334155; margin-bottom: 8px; font-size: 0.95rem;
    }
    
    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1px solid #e2e8f0;
        transition: 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #1976d2;
        box-shadow: 0 0 0 4px rgba(25, 118, 210, 0.1);
    }

    /* Style Upload Gambar */
    .upload-container {
        border: 2px dashed #cbd5e1;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        background: #f8fafc;
        transition: 0.3s;
        cursor: pointer;
        position: relative;
    }
    
    .upload-container:hover { border-color: #1976d2; background: #eff6ff; }
    
    .upload-input {
        position: absolute; width: 100%; height: 100%; top: 0; left: 0; opacity: 0; cursor: pointer;
    }
    
    .preview-box img {
        max-width: 100%; height: 200px; object-fit: cover; border-radius: 10px;
        display: none; /* Sembunyi default */
        margin-top: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* Tombol */
    .btn-simpan {
        background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
        border: none; border-radius: 50px; padding: 12px 30px;
        font-weight: 600; color: white; transition: 0.3s;
    }
    .btn-simpan:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(21, 101, 192, 0.3); color: white; }
    
    .btn-batal {
        background: #f1f5f9; color: #64748b; border: none;
        border-radius: 50px; padding: 12px 30px; font-weight: 600; margin-right: 10px;
    }
    .btn-batal:hover { background: #e2e8f0; color: #334155; }

    /* Custom Summernote Border */
    .note-editor.note-frame {
        border-radius: 10px; border-color: #e2e8f0; overflow: hidden;
    }
    .note-toolbar { background: #f8fafc !important; border-bottom: 1px solid #e2e8f0 !important; }
</style>

<div class="container-fluid py-4">

    <div class="d-flex align-items-center mb-4 justify-content-center" style="max-width: 800px; margin: 0 auto;">
        <div class="w-100">
            <h4 class="fw-bold mb-1 text-dark">Buat Forum Baru</h4>
            <p class="text-muted small mb-0">Tambahkan topik diskusi baru untuk pengguna.</p>
        </div>
    </div>

    <div class="form-card">
        <form method="post" action="<?= base_url('dashboard/admin/simpan-forum') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label class="form-label">Judul Forum <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" placeholder="Contoh: Diskusi Matematika Dasar" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Status Forum</label>
                <select name="status" class="form-select" required>
                    <option value="aktif">Aktif (Dapat dilihat & dikomentari)</option>
                    <option value="tutup">Ditutup (Hanya dapat dilihat)</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Isi / Deskripsi Forum <span class="text-danger">*</span></label>
                <textarea id="konten" name="konten" required></textarea>
            </div>

            <div class="mb-5">
                <label class="form-label">Gambar Sampul (Opsional)</label>
                
                <div class="upload-container">
                    <input type="file" name="gambar" class="upload-input" accept="image/*" onchange="previewImage(event)">
                    <div class="text-center" id="upload-placeholder">
                        <i class="bi bi-cloud-arrow-up text-primary fs-1"></i>
                        <p class="mb-0 fw-bold text-dark mt-2">Klik untuk upload gambar</p>
                        <small class="text-muted">Format: JPG, PNG, JPEG (Max 2MB)</small>
                    </div>
                    
                    <div class="preview-box">
                        <img id="img-preview">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="<?= base_url('dashboard/admin/kelola-forum') ?>" class="btn btn-batal">
                    Batal
                </a>
                <button type="submit" class="btn btn-simpan">
                    <i class="bi bi-check-lg me-1"></i> Simpan Forum
                </button>
            </div>

        </form>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
<script>
    // Init Summernote
    $('#konten').summernote({
        placeholder: 'Tulis deskripsi topik atau pertanyaan di sini...',
        tabsize: 2,
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']], // Gambar saya hapus biar ringan, upload lewat cover aja
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    // Script Preview Gambar
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('img-preview');
        const placeholder = document.getElementById('upload-placeholder');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Munculkan gambar
                placeholder.style.display = 'none'; // Sembunyikan teks upload
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?= $this->endSection() ?>