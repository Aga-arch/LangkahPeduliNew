<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Tambah Bank Soal</h3>

<form action="<?= base_url('dashboard/pengajar/banksoal/simpan') ?>" method="post">

    <div class="mb-3">
        <label class="form-label">Nama Bank Soal</label>
        <input type="text" name="nama_banksoal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Topik Pembelajaran</label>
        <input type="text" name="topik_pembelajaran" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('dashboard/pengajar/banksoal') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
