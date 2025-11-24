<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<style>
.user-card {
    border-radius: 15px;
    padding: 25px 20px;
    background: #ffffff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    text-align: center;
    border: 1px solid #f1f1f1;
}
.user-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 22px rgba(0,0,0,0.10);
}
.user-photo {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    background: #eef2ff;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
}
.user-photo i {
    font-size: 32px;
    color: #6366f1;
}
.user-card h5 {
    margin-top: 12px;
    font-weight: 600;
    font-size: 16px;
    color: #333;
}
.user-card small {
    font-size: 13px;
    color: #777;
}
.badge-role {
    background: #eef2ff;
    color: #4f46e5;
    padding: 5px 12px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 500;
}
.actions {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 12px;
}
.action-btn {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.25s;
    border: none;
}
.action-view { background: #eef9ff; }
.action-view:hover { background: #d9f2ff; }
.action-edit { background: #fff7e6; }
.action-edit:hover { background: #ffecb4; }
.action-delete { background: #ffecec; }
.action-delete:hover { background: #ffcccc; }
.action-btn i { font-size: 18px; }
</style>

<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4">Kelola Akun Pengguna</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <div class="col-md-4 col-lg-3">
                    <div class="user-card">
                        <div class="user-photo">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <h5><?= esc($user['username']) ?></h5>
                        <small><?= esc($user['email']) ?></small>

                        <div class="mt-2">
                            <span class="badge-role"><?= esc($user['role']) ?></span>
                        </div>

                        <div class="actions">
                            <a href="<?= base_url('dashboard/admin/detail-akun/'.$user['id']) ?>" class="action-btn action-view">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="<?= base_url('dashboard/admin/edit-akun/'.$user['id']) ?>" class="action-btn action-edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="<?= base_url('dashboard/admin/delete-akun/'.$user['id']) ?>"
                               onclick="return confirm('Yakin ingin menghapus akun ini?')" class="action-btn action-delete">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center text-muted mt-4">Belum ada data pengguna.</div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
