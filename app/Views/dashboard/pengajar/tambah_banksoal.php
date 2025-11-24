<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h2>Tambah Bank Soal</h2>

<form action="<?= base_url('dashboard/pengajar/banksoal/simpan') ?>" method="post">
    <label>Nama Bank Soal</label><br>
    <input type="text" name="nama_banksoal" required><br><br>

    <label>Topik Pembelajaran</label><br>
    <input type="text" name="topik_pembelajaran" required><br><br>

    <label>Mata Pelajaran</label><br>
    <input type="text" name="mata_pelajaran" required><br><br>

    <button type="submit">Simpan</button>
</form>

<?= $this->endSection() ?>
