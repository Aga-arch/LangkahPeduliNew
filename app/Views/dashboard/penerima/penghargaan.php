<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<style>
    .reward-card {
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        padding: 25px;
        text-align: center;
        transition: 0.25s ease-in-out;
        position: relative;
        overflow: hidden;
        min-height: 260px;
    }

    .reward-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
    }

    .reward-card img {
        width: 75px;
        height: 75px;
        object-fit: contain;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    .reward-locked {
        opacity: 0.4;
        filter: grayscale(100%);
    }

    .badge-status {
        position: absolute;
        top: 12px;
        right: 12px;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 10.5px;
        font-weight: 600;
    }

    .badge-got {
        background: #4ade80;
        color: white;
    }

    .badge-not {
        background: #e5e7eb;
        color: #555;
    }

    .reward-title {
        font-weight: 700;
        color: #4f46e5;
        margin-bottom: 6px;
    }

    .reward-description {
        font-size: 14px;
        color: #666;
        min-height: 60px;
    }

    .category-badge {
        background: #eef2ff;
        color: #4338ca;
        border-radius: 10px;
        padding: 4px 10px;
        font-size: 12px;
        margin-top: 10px;
        display: inline-block;
    }
</style>

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Penghargaan Saya 🏅</h2>
        <p class="text-muted">Lihat semua penghargaan yang kamu miliki dan yang masih bisa kamu capai.</p>
    </div>

    <div class="row g-4 justify-content-center">

        <?php if (!empty($semua_penghargaan)): ?>
            <?php foreach ($semua_penghargaan as $p): ?>

                <?php
                    $sudah = false;
                    foreach ($punya as $u) {
                        if ($u['id_penghargaan'] == $p['id_penghargaan']) {
                            $sudah = true;
                            break;
                        }
                    }
                ?>

                <div class="col-md-4 col-sm-6">

                    <div class="reward-card <?= $sudah ? '' : 'reward-locked' ?>">

                        <!-- STATUS BADGE -->
                        <span class="badge-status <?= $sudah ? 'badge-got' : 'badge-not' ?>">
                            <?= $sudah ? 'Sudah Didapatkan' : 'Belum Didapatkan' ?>
                        </span>

                        <!-- ICON / DEFAULT ICON -->
                        <?php if (!empty($p['icon'])): ?>
                            <img src="<?= base_url('uploads/icon/'.$p['icon']) ?>" alt="<?= esc($p['nama_penghargaan']) ?>">
                        <?php else: ?>
                            <i class="bi bi-award" style="font-size:50px; color:#facc15"></i>
                        <?php endif; ?>

                        <!-- NAME -->
                        <h5 class="reward-title"><?= esc($p['nama_penghargaan']) ?></h5>

                        <!-- DESCRIPTION -->
                        <p class="reward-description"><?= esc($p['deskripsi']) ?></p>

                        <!-- CATEGORY -->
                        <span class="category-badge">
                            <?= ucfirst(esc($p['kategori'])) ?>
                        </span>

                    </div>

                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-muted">Belum ada penghargaan yang tersedia.</p>
        <?php endif; ?>

    </div>

</div>

<?= $this->endSection() ?>
