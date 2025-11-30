<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Kelola Materi</h3>
<p>Berikut adalah daftar materi yang tersedia di sistem.</p>

<div class="mb-3">
    <a href="<?= base_url('dashboard/pengajar/materi/tambah') ?>" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Tambah Materi Baru
    </a>
</div>

<table class="table table-bordered mt-3">
    <thead>
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
                    <td><?= esc($row['nama_kategori']) ?></td>
                    <td><?= esc($row['judul_materi']) ?></td>
                    <td><?= esc($row['isi_materi']) ?></td>
                    <td><?= esc($row['pengajar']) ?></td>
                    <td><?= esc($row['created_at']) ?></td>
                    <td>
                        <?php if($row['pengajar'] == $username): ?>
                            <a href="<?= base_url('dashboard/pengajar/materi/edit/'.$row['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?= base_url('dashboard/pengajar/materi/hapus/'.$row['id']) ?>" 
                               class="btn btn-danger btn-sm"
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

<?= $this->endSection() ?>
