<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h3 class="fw-bold header-gradient mb-3">Kelola Materi</h3>
    <p>Berikut adalah daftar materi yang tersedia di sistem.</p>

    <div class="mb-3">
        <a href="<?= base_url('dashboard/pengajar/materi/tambah') ?>" class="btn btn-gradient btn-hover">
            <i class="bi bi-plus-circle"></i> Tambah Materi Baru
        </a>
    </div>

    <div class="card glass-card shadow-lg p-3">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Judul Materi</th>
                    <th>Isi Materi</th>
                    <th>Pengajar</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($materi)): ?>
                    <?php foreach ($materi as $index => $row): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td><?= $row['judul_materi'] ?></td>

                            <!-- TAMPILKAN SEMUA HTML MATERI -->
                            <td style="max-width: 350px; white-space: normal;">
                                <?= $row['isi_materi'] ?>
                            </td>

                            <td><?= $row['pengajar'] ?></td>
                            <td><?= $row['created_at'] ?></td>

                            <td>
                                <?php if($row['pengajar'] == $username): ?>
                                    <a href="<?= base_url('dashboard/pengajar/materi/edit/'.$row['id']) ?>" 
                                       class="btn btn-primary btn-sm btn-hover">Edit</a>

                                    <a href="<?= base_url('dashboard/pengajar/materi/hapus/'.$row['id']) ?>" 
                                       class="btn btn-danger btn-sm btn-hover"
                                       onclick="return confirm('Yakin ingin menghapus materi ini?')">Hapus</a>
                                <?php else: ?>
                                    <span class="text-muted">Tidak bisa diedit</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Belum ada materi tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.glass-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(10px); border-radius:1rem; border:1px solid rgba(0,123,255,0.15);}
.table-hover tbody tr:hover { background: rgba(79,172,254,0.1);}
.btn-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);color:#fff;font-weight:600;border:none;transition:all 0.3s ease;}
.btn-gradient:hover{transform: translateY(-2px);box-shadow:0 6px 15px rgba(0,123,255,0.3);}
.btn-hover{transition:all 0.3s ease;}
.header-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);-webkit-background-clip:text;color:transparent;}
</style>

<?= $this->endSection() ?>
