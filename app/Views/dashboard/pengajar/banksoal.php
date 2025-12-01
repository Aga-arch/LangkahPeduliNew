<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold header-gradient">Daftar Bank Soal</h2>
        <a href="<?= base_url('dashboard/pengajar/banksoal/tambah') ?>" class="btn btn-gradient btn-lg btn-hover">
            <i class="bi bi-plus-circle me-2"></i> Tambah Bank Soal
        </a>
    </div>

    <!-- Glass Card Table -->
    <div class="card glass-card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead class="table-header">
                        <tr>
                            <th style="width:5%;">No</th>
                            <th>Nama Bank Soal</th>
                            <th>Topik</th>
                            <th>Mata Pelajaran</th>
                            <th style="width:25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($banksoal)) : ?>
                            <?php foreach ($banksoal as $i => $b) : ?>
                                <tr class="table-row animate-row" style="animation-delay: <?= $i*0.05 ?>s;">
                                    <td><?= $i + 1 ?></td>
                                    <td class="fw-semibold"><?= esc($b['nama_banksoal']) ?></td>
                                    <td><span class="badge badge-gradient-info"><?= esc($b['topik_pembelajaran']) ?></span></td>
                                    <td><span class="badge badge-gradient-warning"><?= esc($b['mata_pelajaran']) ?></span></td>
                                    <td>
                                        <a href="<?= base_url('dashboard/pengajar/banksoal/detail/'.$b['id_banksoal']) ?>" class="btn btn-outline-info btn-sm btn-icon" data-bs-toggle="tooltip" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="<?= base_url('dashboard/pengajar/banksoal/edit/'.$b['id_banksoal']) ?>" class="btn btn-outline-primary btn-sm btn-icon" data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="<?= base_url('dashboard/pengajar/banksoal/hapus/'.$b['id_banksoal']) ?>" class="btn btn-outline-danger btn-sm btn-icon" onclick="return confirm('Hapus bank soal ini?')" data-bs-toggle="tooltip" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted fst-italic">Belum ada bank soal</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<style>
    body {
        background: linear-gradient(180deg, #e0f0ff 0%, #ffffff 100%);
        font-family: 'Segoe UI', sans-serif;
    }

    /* Header Gradient */
    .header-gradient {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        -webkit-background-clip: text;
        color: transparent;
    }

    /* Glass card */
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 123, 255, 0.15);
    }

    /* Table header */
    .table-header th {
        background: #dbe9ff;
        color: #0d3c91;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* Table row hover */
    .table-row {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .table-row:hover {
        background: #f1f7ff;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    /* Badges gradient pastel */
    .badge {
        font-size: 0.85rem;
        padding: 0.45em 0.7em;
        border-radius: 0.5rem;
    }
    .badge-gradient-info {
        background: linear-gradient(90deg, #a1c4fd, #c2e9fb);
        color: #0d3c91;
        font-weight: 500;
    }
    .badge-gradient-warning {
        background: linear-gradient(90deg, #ffe29f, #ffa99f);
        color: #663c00;
        font-weight: 500;
    }

    /* Buttons */
    .btn-gradient {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,123,255,0.3);
    }

    .btn-hover {
        transition: all 0.3s ease;
    }
    .btn-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    .btn-icon {
        border-radius: 50%;
        padding: 0.45rem 0.45rem;
        transition: all 0.3s ease;
    }
    .btn-icon:hover {
        transform: scale(1.2);
    }

    /* Animate table row fade + slide */
    .animate-row {
        opacity: 0;
        transform: translateY(15px);
        animation: fadeSlideIn 0.5s forwards;
    }
    @keyframes fadeSlideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>

<?= $this->endSection() ?>
