<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Tambah Bank Soal</h3>

<form action="<?= base_url('dashboard/pengajar/banksoal/simpan') ?>" method="post">
    <div class="mb-3">
        <label>Type Soal</label>
        <select name="type_soal" class="form-control">
            <option value="PG">Pilihan Ganda</option>
            <option value="Essay">Essay</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Pertanyaan</label>
        <textarea name="pertanyaan" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Opsi (jika PG, pisahkan tiap opsi)</label>
        <input type="text" name="opsi[]" class="form-control">
        <input type="text" name="opsi[]" class="form-control mt-1">
        <input type="text" name="opsi[]" class="form-control mt-1">
        <input type="text" name="opsi[]" class="form-control mt-1">
    </div>
    <div class="mb-3">
        <label>Jawaban</label>
        <input type="text" name="jawaban" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tingkat Kesulitan</label>
        <select name="tingkat_kesulitan" class="form-control">
            <option value="Mudah">Mudah</option>
            <option value="Sedang">Sedang</option>
            <option value="Sulit">Sulit</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>
