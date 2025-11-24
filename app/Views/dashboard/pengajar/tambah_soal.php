<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Tambah Soal - Bank Soal: <?= esc($banksoal['nama_banksoal']) ?></h3>

<form action="<?= base_url('dashboard/pengajar/soal/simpan/'.$banksoal['id_banksoal']) ?>" method="post">
    <div class="mb-3">
        <label for="pertanyaan" class="form-label">Pertanyaan</label>
        <textarea name="pertanyaan" id="pertanyaan" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="jawaban_a" class="form-label">Opsi A</label>
        <input type="text" name="jawaban_a" id="jawaban_a" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="jawaban_b" class="form-label">Opsi B</label>
        <input type="text" name="jawaban_b" id="jawaban_b" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="jawaban_c" class="form-label">Opsi C</label>
        <input type="text" name="jawaban_c" id="jawaban_c" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="jawaban_d" class="form-label">Opsi D</label>
        <input type="text" name="jawaban_d" id="jawaban_d" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="kunci_jawaban" class="form-label">Jawaban Benar</label>
        <select name="kunci_jawaban" id="kunci_jawaban" class="form-select" required>
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
