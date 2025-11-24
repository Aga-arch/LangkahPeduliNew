<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<style>
    .edit-card {
        max-width: 650px;
        margin: auto;
        padding: 30px;
        border-radius: 18px;
        background: white;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        transition: 0.3s;
    }
    .edit-card:hover {
        transform: translateY(-3px);
    }

    .form-label {
        font-weight: 500;
        color: #555;
    }

    .btn-submit {
        background: #4f46e5;
        border: none;
        color: white;
        font-weight: 500;
        padding: 8px 22px;
        border-radius: 12px;
        transition: 0.25s;
    }
    .btn-submit:hover {
        background: #3b34c4;
    }

    .btn-cancel {
        background: #f0f1f5;
        border: none;
        color: #555;
        border-radius: 12px;
        padding: 8px 22px;
        font-weight: 500;
    }
    .btn-cancel:hover {
        background: #d6d8df;
    }
</style>

<div class="container px-4">
    <h4 class="fw-bold mb-4">Edit Akun</h4>

    <div class="edit-card">
        <form id="formEditAkun" method="post" action="<?= base_url('dashboard/admin/update-akun/'.$user['id']) ?>">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" value="<?= esc($user['username']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="<?= esc($user['email']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="pengajar" <?= $user['role'] == 'pengajar' ? 'selected' : '' ?>>Pengajar</option>
                    <option value="penerima" <?= $user['role'] == 'penerima' ? 'selected' : '' ?>>Penerima</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-submit" onclick="confirmUpdate()">
                    <i class="bi bi-check-circle"></i> Simpan Perubahan
                </button>
                <a href="<?= base_url('dashboard/admin/kelola-akun') ?>" class="btn btn-cancel">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function confirmUpdate() {
    if (confirm("Apakah Anda yakin ingin menyimpan perubahan akun ini?")) {
        document.getElementById("formEditAkun").submit();
    }
}
</script>

<?= $this->endSection() ?>
