<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

    <!-- Judul Forum -->
    <h3 class="fw-bold mb-3"><?= esc($forum['judul']) ?></h3>

    <!-- Gambar Forum -->
    <?php if (!empty($forum['gambar'])): ?>
        <img src="<?= base_url('uploads/forum/' . $forum['gambar']) ?>"
             class="mb-3"
             style="max-width:400px; border-radius:10px;">
    <?php endif; ?>

    <!-- Konten Forum -->
    <p><?= esc($forum['konten']) ?></p>

    <p class="text-muted small">
        Dibuat pada <?= date('d M Y H:i', strtotime($forum['tanggal'])) ?>
    </p>

    <hr>

    <!-- ================= KOMENTAR ================= -->
    <h5 class="fw-bold mb-3">Komentar</h5>

    <?php if (empty($komentar)): ?>
        <p class="text-muted">Belum ada komentar.</p>
    <?php else: ?>
        <?php foreach ($komentar as $k): ?>
            <div class="p-3 mb-2 border rounded bg-light">

                <!-- Nama User -->
                <strong><?= esc($k['name']) ?></strong>

                <!-- Isi Komentar -->
                <p class="mb-1"><?= esc($k['isi']) ?></p>

                <!-- Tanggal & Aksi -->
                <div class="d-flex justify-content-between align-items-center">
                    <span class="small text-muted">
                        <?= date('d M Y H:i', strtotime($k['tanggal'])) ?>
                    </span>

                    <!-- Tombol Hapus -->
                    <?php if (
                        session()->get('role') === 'admin' ||
                        session()->get('id') == $k['user_id']
                    ): ?>
                        <a href="<?= base_url('dashboard/forum/komentar/hapus/' . $k['id']) ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus komentar ini?')">
                            Hapus
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- ================= FORM KOMENTAR ================= -->
    <?php if (session()->get('id')): ?>
        <form method="post" action="<?= base_url('dashboard/forum/komentar/' . $forum['id']) ?>" class="mt-3">
            <?= csrf_field() ?>

            <textarea name="isi"
                      class="form-control mb-2"
                      rows="3"
                      placeholder="Tulis komentar..."
                      required></textarea>

            <button type="submit" class="btn btn-primary btn-sm">
                Kirim Komentar
            </button>
        </form>
    <?php else: ?>
        <p class="text-muted mt-3">
            <a href="<?= base_url('login') ?>">Login</a> untuk menulis komentar.
        </p>
    <?php endif; ?>

    <!-- Tombol Kembali -->
    <a href="<?= base_url('dashboard/forum') ?>" class="btn btn-secondary btn-sm mt-4">
        Kembali
    </a>

</div>

<?= $this->endSection() ?>