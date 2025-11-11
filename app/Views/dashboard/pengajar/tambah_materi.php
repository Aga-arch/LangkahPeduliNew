<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Tambah Materi Baru</h3>

<form action="<?= base_url('dashboard/pengajar/materi/simpan') ?>" method="post">
    <div class="mb-3">
        <label for="kode_mapel" class="form-label">Kode Mapel</label>
        <input type="text" name="kode_mapel" id="kode_mapel" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="nama_mapel" class="form-label">Nama Mapel</label>
        <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label for="pengajar" class="form-label">Pengajar</label>
        <input type="text" name="pengajar" id="pengajar" class="form-control" value="<?= esc(session()->get('username')) ?>" readonly>
    </div>
    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
    <a href="<?= base_url('dashboard/pengajar/materi') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
