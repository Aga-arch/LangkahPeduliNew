<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<style>
    .detail-card {
        max-width: 650px;
        margin: auto;
        padding: 30px;
        border-radius: 18px;
        background: white;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        transition: 0.3s;
    }
    .detail-card:hover {
        transform: translateY(-3px);
    }

    .profile-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #e9e7ff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        margin: auto;
        margin-bottom: 15px;
        color: #4f46e5;
    }

    .info-table th {
        width: 40%;
        font-weight: 600;
        color: #4f4f4f;
        background: #f7f8ff;
        vertical-align: middle;
    }

    .action-buttons a {
        width: 48%;
        border-radius: 12px;
        padding: 8px 0;
        font-weight: 500;
    }

    .btn-back {
        background: #f0f1f5;
        border: none;
        color: #555;
    }
    .btn-back:hover {
        background: #d6d8df;
    }

    .btn-edit {
        background: #ffd13b;
        border: none;
        color: black;
    }
    .btn-edit:hover {
        background: #ffc107;
    }
</style>

<div class="container px-4">
    <h4 class="fw-bold mb-4">Detail Akun</h4>

    <div class="detail-card">
        
        <!-- Profile Icon -->
        <div class="profile-icon">
            <i class="bi bi-person"></i>
        </div>
        <h5 class="text-center mb-3"><?= esc($user['username']) ?></h5>

        <!-- Info Table -->
        <table class="table info-table mb-4">
            <tr>
                <th>Username</th>
                <td><?= esc($user['username']) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= esc($user['email']) ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    <span class="badge bg-primary px-3 py-2">
                        <?= esc($user['role']) ?>
                    </span>
                </td>
            </tr>
        </table>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-between action-buttons">
            <a href="<?= base_url('dashboard/admin/kelola-akun') ?>" class="btn btn-back">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <a href="<?= base_url('dashboard/admin/edit-akun/'.$user['id']) ?>" class="btn btn-edit">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
