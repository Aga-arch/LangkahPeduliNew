<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">

<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4">Buat Forum Baru</h3>

    <form method="post" action="<?= base_url('dashboard/admin/simpan-forum') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Judul Forum</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Forum</label>
            <textarea id="konten" name="konten"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="aktif">Aktif</option>
                <option value="tutup">Ditutup</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('dashboard/admin/kelola-forum') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
<script>
    $('#konten').summernote({
        placeholder: 'Tulis isi forum di sini...',
        height: 200
    });
</script>

<?= $this->endSection() ?>
