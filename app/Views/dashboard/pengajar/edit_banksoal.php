<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Edit Soal</h3>

<form action="<?= base_url('pengajar/banksoal/update/'.$soal['id']) ?>" method="post">
    <div class="mb-3">
        <label>Pertanyaan</label>
        <textarea name="pertanyaan" class="form-control" required><?= esc($soal['pertanyaan']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Jawaban</label>
        <textarea name="jawaban" class="form-control" required><?= esc($soal['jawaban']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Tipe Soal</label>
        <select name="type_soal" class="form-control" required>
            <option value="pilihan_ganda" <?= $soal['type_soal']=='pilihan_ganda'?'selected':'' ?>>Pilihan Ganda</option>
            <option value="esai" <?= $soal['type_soal']=='esai'?'selected':'' ?>>Esai</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Tingkat Kesulitan</label>
        <select name="tingkat_kesulitan" class="form-control" required>
            <option value="mudah" <?= $soal['tingkat_kesulitan']=='mudah'?'selected':'' ?>>Mudah</option>
            <option value="sedang" <?= $soal['tingkat_kesulitan']=='sedang'?'selected':'' ?>>Sedang</option>
            <option value="sulit" <?= $soal['tingkat_kesulitan']=='sulit'?'selected':'' ?>>Sulit</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Soal</button>
    <a href="<?= base_url('pengajar/banksoal') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
