<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Edit Bank Soal</h3>

<form action="<?= base_url('dashboard/pengajar/banksoal/update/'.$banksoal['id_banksoal']) ?>" method="post">

    <div class="mb-3">
        <label class="form-label">Nama Bank Soal</label>
        <input type="text" name="nama_banksoal" class="form-control" 
               value="<?= esc($banksoal['nama_banksoal']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Topik Pembelajaran</label>
        <input type="text" name="topik_pembelajaran" class="form-control" 
               value="<?= esc($banksoal['topik_pembelajaran']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" class="form-control" 
               value="<?= esc($banksoal['mata_pelajaran']) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('dashboard/pengajar/banksoal') ?>" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection() ?>
