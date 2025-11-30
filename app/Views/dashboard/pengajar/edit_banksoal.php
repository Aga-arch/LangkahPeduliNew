<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Edit Bank Soal</h3>

<div class="card">
    <div class="card-body">

        <form action="<?= base_url('dashboard/pengajar/banksoal/update/' . $banksoal['id_banksoal']) ?>" method="post">

            <div class="mb-3">
                <label class="form-label"><strong>Nama Bank Soal</strong></label>
                <input type="text" name="nama_banksoal" class="form-control"
                       value="<?= esc($banksoal['nama_banksoal']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Topik Pembelajaran</strong></label>
                <input type="text" name="topik_pembelajaran" class="form-control"
                       value="<?= esc($banksoal['topik_pembelajaran']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Mata Pelajaran</strong></label>
                <input type="text" name="mata_pelajaran" class="form-control"
                       value="<?= esc($banksoal['mata_pelajaran']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update</button>
            <a href="<?= base_url('dashboard/pengajar/banksoal') ?>" class="btn btn-secondary mt-2">
                Kembali
            </a>

        </form>

    </div>
</div>

<?= $this->endSection() ?>
