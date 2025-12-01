<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h3 class="fw-bold header-gradient mb-4">Edit Quiz</h3>
    <a href="<?= base_url('dashboard/pengajar/quiz') ?>" class="text-decoration-none mb-3 d-inline-block">&laquo; Kembali ke Daftar Quiz</a>

    <div class="card glass-card shadow-lg border-0 rounded-4 p-4">
        <form action="<?= base_url('dashboard/pengajar/quiz/update/' . $quiz['id_quiz']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Quiz</label>
                <input type="text" name="judul_quiz" class="form-control input-glass" value="<?= esc($quiz['judul_quiz']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control input-glass" rows="3"><?= esc($quiz['deskripsi']) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Waktu pengerjaan (menit)</label>
                <input type="number" name="waktu_menit" class="form-control input-glass" value="<?= esc($quiz['waktu_menit']) ?>" min="1" required>
            </div>
            <button type="submit" class="btn btn-gradient btn-hover mt-3">Simpan Perubahan</button>
        </form>
    </div>
</div>

<style>
    .glass-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(10px); border:1px solid rgba(0,123,255,0.15); border-radius:1rem;}
    .input-glass { background: rgba(255,255,255,0.8); border:1px solid rgba(0,123,255,0.3); border-radius:0.5rem; padding:0.6rem 1rem; transition:all 0.3s ease;}
    .input-glass:focus { border-color:#4facfe; box-shadow:0 0 8px rgba(79,172,254,0.4); outline:none; background: rgba(255,255,255,0.9);}
    .header-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);-webkit-background-clip:text;color:transparent;}
    .btn-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);color:#fff;font-weight:600;transition:all 0.3s ease;border:none;}
    .btn-gradient:hover{transform: translateY(-2px);box-shadow:0 6px 15px rgba(0,123,255,0.3);}
    .btn-hover{transition:all 0.3s ease;}
</style>

<?= $this->endSection() ?>
