<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4">Kelola Forum</h3>

    <a href="<?= base_url('dashboard/admin/tambah-forum') ?>" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Buat Forum Baru
    </a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="row g-3">
        <?php foreach ($forums as $forum): ?>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3">
                    <?php if ($forum['gambar']): ?>
                        <img src="<?= base_url('uploads/forum/'.$forum['gambar']) ?>" class="rounded mb-2" style="height:130px; width:100%; object-fit:cover;">
                    <?php endif; ?>
                    <h5 class="fw-bold"><?= esc($forum['judul']) ?></h5>
                    <p class="text-muted small"><?= date('d M Y H:i', strtotime($forum['tanggal'])) ?></p>
                    <span class="badge <?= $forum['status'] == 'aktif' ? 'bg-success' : 'bg-secondary' ?>">
                        <?= esc($forum['status']) ?>
                    </span>
                    <div class="mt-3 d-flex">
                        <a href="<?= base_url('dashboard/admin/edit-forum/'.$forum['id']) ?>" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil"></i></a>
                        <a href="<?= base_url('dashboard/admin/hapus-forum/'.$forum['id']) ?>" onclick="return confirm('Yakin hapus forum?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
