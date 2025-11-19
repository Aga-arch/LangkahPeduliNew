<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<style>
.forum-card {
    background: #fff;
    padding: 25px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    transition: .3s;
}
.forum-card:hover {
    transform: translateY(-6px);
}
.forum-card img {
    width: 110px;
    margin-bottom: 15px;
}
.btn-forum {
    background: #333;
    border: none;
    padding: 8px 25px;
    border-radius: 8px;
    color: #fff;
}
</style>

<div class="container py-4">
    <h3 class="fw-bold mb-4">📚 Daftar Forum</h3>

    <div class="row g-4 justify-content-center">

        <?php if (!empty($forums)): ?>

            <?php foreach ($forums as $f): ?>

                <?php
                    // AUTO DETECT kolom "nama"
                    $nama = $f['nama']
                        ?? $f['name']
                        ?? $f['NAME']
                        ?? $f['forum_name']
                        ?? $f['title']
                        ?? 'Tanpa Nama';

                    // AUTO DETECT kolom "description"
                    $desc = $f['description']
                        ?? $f['DESCRIPTION']
                        ?? $f['deskripsi']
                        ?? $f['detail']
                        ?? '-';

                    // AUTO DETECT kolom logo
                    $logo = $f['logo']
                        ?? $f['LOGO']
                        ?? $f['icon']
                        ?? null;

                    // AUTO DETECT ID
                    $id = $f['id']
                        ?? $f['ID']
                        ?? 0;
                ?>

                <div class="col-md-3">
                    <div class="forum-card">

                        <?php if ($logo): ?>
                            <img src="<?= base_url('images/' . $logo) ?>" alt="Forum Logo">
                        <?php endif; ?>

                        <h5><?= esc($nama) ?></h5>
                        <p class="text-muted"><?= esc($desc) ?></p>

                        <a href="<?= base_url('dashboard/forum/room/' . $id) ?>" 
                           class="btn btn-forum mt-2">
                           Masuk
                        </a>
                    </div>
                </div>

            <?php endforeach; ?>

        <?php else: ?>
            <p class="text-muted text-center">Belum ada forum tersedia.</p>
        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>
