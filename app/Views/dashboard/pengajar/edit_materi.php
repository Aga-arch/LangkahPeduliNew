<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Edit Materi</h3>

<form action="<?= base_url('dashboard/pengajar/materi/update/'.$materi['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach($kategori as $k): ?>
                <option value="<?= $k['id'] ?>" <?= $materi['id_kategori']==$k['id']?'selected':'' ?>><?= $k['nama_kategori'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Judul Materi</label>
        <input type="text" name="judul_materi" class="form-control" value="<?= esc($materi['judul_materi']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi Materi</label>
        <textarea name="isi_materi" id="isi_materi" class="form-control" rows="10"><?= esc($materi['isi_materi']) ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Upload File (PDF, DOCX, Video)</label>
        <input type="file" name="file" class="form-control">
        <?php if($materi['file']): ?>
            <small>File saat ini: <a href="<?= base_url('uploads/materi/'.$materi['file']) ?>" target="_blank"><?= $materi['file'] ?></a></small>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-success">Update Materi</button>
    <a href="<?= base_url('dashboard/pengajar/materi') ?>" class="btn btn-secondary">Kembali</a>
</form>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi_materi');
</script>

<?= $this->endSection() ?>
