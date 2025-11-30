<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Tambah Soal - Bank Soal: <?= esc($banksoal['nama_banksoal']) ?></h3>

<form action="<?= base_url('dashboard/pengajar/soal/simpan/'.$banksoal['id_banksoal']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="isi_soal" class="form-label">Pertanyaan</label>
        <textarea name="isi_soal" id="isi_soal" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="opsi1" class="form-label">Opsi A</label>
        <input type="text" name="opsi1" id="opsi1" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="opsi2" class="form-label">Opsi B</label>
        <input type="text" name="opsi2" id="opsi2" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="opsi3" class="form-label">Opsi C</label>
        <input type="text" name="opsi3" id="opsi3" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="opsi4" class="form-label">Opsi D</label>
        <input type="text" name="opsi4" id="opsi4" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="jawaban" class="form-label">Jawaban Benar</label>
        <select name="jawaban" id="jawaban" class="form-select" required>
            <option value="">-- Pilih Jawaban --</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan Soal</button>
</form>

<?= $this->endSection() ?>
