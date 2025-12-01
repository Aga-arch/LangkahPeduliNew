<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Edit Quiz</h3>
<a href="<?= base_url('dashboard/pengajar/quiz') ?>">&laquo; Kembali ke Daftar Quiz</a>

<form action="<?= base_url('dashboard/pengajar/quiz/update/' . $quiz['id_quiz']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label>Nama Quiz</label>
        <input type="text" name="judul_quiz" class="form-control" value="<?= esc($quiz['judul_quiz']) ?>" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"><?= esc($quiz['deskripsi']) ?></textarea>
    </div>

    <div class="mb-3">
        <label>Waktu pengerjaan (menit)</label>
        <input type="number" name="waktu_menit" class="form-control" value="<?= esc($quiz['waktu_menit']) ?>" min="1" required>
    </div>

    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
</form>

<?= $this->endSection() ?>
