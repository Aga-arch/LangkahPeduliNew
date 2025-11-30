<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Tambah Materi</h3>
<p>Silakan isi data materi berikut.</p>

<form action="<?= base_url('dashboard/pengajar/materi/simpan') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach($kategori as $k): ?>
                <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Judul Materi</label>
        <input type="text" name="judul_materi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi Materi</label>
        <textarea name="isi_materi" id="isi_materi" class="form-control" rows="10"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Upload File (PDF, DOCX, Video)</label>
        <input type="file" name="file" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan Materi</button>
    <a href="<?= base_url('dashboard/pengajar/materi') ?>" class="btn btn-secondary">Kembali</a>
</form>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi_materi');
</script>

<?= $this->endSection() ?>
