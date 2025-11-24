<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Kelola Materi</h3>
        <a href="<?= base_url('dashboard/pengajar/materi/tambah') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Materi
        </a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <?php if(!empty($materi)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Mapel</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Deskripsi</th>
                            <th>Pengajar</th>
                            <th>Created At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($materi as $m): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($m['kode_mapel']) ?></td>
                            <td><?= esc($m['nama_mapel']) ?></td>
                            <td><?= esc($m['deskripsi']) ?></td>
                            <td><?= esc($m['pengajar']) ?></td>
                            <td><?= esc($m['created_at']) ?></td>
                            <td>
                                <a href="<?= base_url('dashboard/pengajar/materi/edit/'.$m['id']) ?>" 
                                   class="btn btn-sm btn-primary">Edit</a>

                                <a href="<?= base_url('dashboard/pengajar/materi/hapus/'.$m['id']) ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">Belum ada materi.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
