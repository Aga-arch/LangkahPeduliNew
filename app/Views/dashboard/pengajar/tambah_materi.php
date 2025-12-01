<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h3 class="fw-bold header-gradient mb-4">Tambah Materi</h3>
    <p>Silakan isi data materi berikut.</p>

    <div class="card glass-card shadow-lg p-4">
        <form action="<?= base_url('dashboard/pengajar/materi/simpan') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label fw-semibold">Kategori</label>
                <select name="id_kategori" class="form-select input-glass" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach($kategori as $k): ?>
                        <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Materi</label>
                <input type="text" name="judul_materi" class="form-control input-glass" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi Materi</label>
                <textarea name="isi_materi" id="isi_materi" class="form-control input-glass" rows="10"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Upload File (PDF, DOCX, Video)</label>
                <input type="file" name="file" class="form-control input-glass">
            </div>

            <button type="submit" class="btn btn-gradient btn-hover">Simpan Materi</button>
            <a href="<?= base_url('dashboard/pengajar/materi') ?>" class="btn btn-secondary btn-hover ms-2">Kembali</a>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi_materi');
</script>

<style>
.glass-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(10px); border:1px solid rgba(0,123,255,0.15); border-radius:1rem;}
.input-glass { background: rgba(255,255,255,0.9); border:1px solid rgba(0,123,255,0.3); border-radius:0.5rem; padding:0.6rem 1rem; transition:all 0.3s ease;}
.input-glass:focus { border-color:#4facfe; box-shadow:0 0 8px rgba(79,172,254,0.4); outline:none; background: rgba(255,255,255,0.95);}
.btn-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);color:#fff;font-weight:600;transition:all 0.3s ease;border:none;}
.btn-gradient:hover{transform: translateY(-2px);box-shadow:0 6px 15px rgba(0,123,255,0.3);}
.btn-hover{transition:all 0.3s ease;}
.header-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);-webkit-background-clip:text;color:transparent;}
</style>

<?= $this->endSection() ?>
