<?= $this->extend('layout/dashboard_admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4">Kelola Akun Pengguna</h3>

    <!-- Notifikasi pesan sukses -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tabel daftar pengguna -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php $no = 1; foreach ($users as $user): ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= esc($user['username']) ?></td>
                                <td><?= esc($user['email']) ?></td>
                                <td><?= esc($user['role']) ?></td>
                                <td>
                                    <a href="<?= base_url('dashboard/admin/detail-akun/'.$user['id']) ?>" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                    <a href="<?= base_url('dashboard/admin/edit-akun/'.$user['id']) ?>" class="btn btn-warning btn-sm text-white">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="<?= base_url('dashboard/admin/delete-akun/'.$user['id']) ?>" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')" 
                                       class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pengguna.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
