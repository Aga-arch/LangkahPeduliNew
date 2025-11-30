<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Edit Soal</h3>

<?php if (isset($banksoal) && !empty($banksoal)): ?>
    <p><strong>Nama Bank Soal:</strong> <?= esc($banksoal['nama_banksoal']) ?></p>
    <p><strong>Topik Pembelajaran:</strong> <?= esc($banksoal['topik_pembelajaran']) ?></p>
    <p><strong>Mata Pelajaran:</strong> <?= esc($banksoal['mata_pelajaran']) ?></p>
<?php else: ?>
    <p class="text-muted">Informasi bank soal tidak tersedia.</p>
<?php endif; ?>

<div class="card mt-3">
    <div class="card-body">

        <!-- Form edit soal -->
        <form action="<?= base_url('dashboard/pengajar/soal/update/' . $soal['id_soal']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id_banksoal" value="<?= $soal['id_banksoal'] ?>">

            <div class="mb-3">
                <label>Isi Soal</label>
                <textarea name="isi_soal" class="form-control" required><?= esc($soal['isi_soal']) ?></textarea>
            </div>

            <div class="mb-3">
                <label>Opsi A</label>
                <input type="text" name="opsi1" class="form-control" value="<?= esc($soal['opsi1']) ?>" required>
            </div>

            <div class="mb-3">
                <label>Opsi B</label>
                <input type="text" name="opsi2" class="form-control" value="<?= esc($soal['opsi2']) ?>" required>
            </div>

            <div class="mb-3">
                <label>Opsi C</label>
                <input type="text" name="opsi3" class="form-control" value="<?= esc($soal['opsi3']) ?>" required>
            </div>

            <div class="mb-3">
                <label>Opsi D</label>
                <input type="text" name="opsi4" class="form-control" value="<?= esc($soal['opsi4']) ?>" required>
            </div>

            <div class="mb-3">
                <label>Jawaban Benar</label>
                <select name="jawaban" class="form-select" required>
                    <option value="A" <?= ($soal['jawaban'] == 'A' ? 'selected' : '') ?>>A</option>
                    <option value="B" <?= ($soal['jawaban'] == 'B' ? 'selected' : '') ?>>B</option>
                    <option value="C" <?= ($soal['jawaban'] == 'C' ? 'selected' : '') ?>>C</option>
                    <option value="D" <?= ($soal['jawaban'] == 'D' ? 'selected' : '') ?>>D</option>
                </select>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?= base_url('dashboard/pengajar/banksoal/detail/' . $soal['id_banksoal']) ?>" class="btn btn-secondary">Kembali</a>
            </div>

        </form>

    </div>
</div>

<?= $this->endSection() ?>
