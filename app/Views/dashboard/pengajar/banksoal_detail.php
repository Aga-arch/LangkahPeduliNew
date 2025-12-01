<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">

    <!-- Header Bank Soal -->
    <div class="card glass-card shadow-lg p-4 mb-4">
        <h3 class="fw-bold header-gradient mb-2">Bank Soal: <?= esc($banksoal['nama_banksoal']) ?></h3>
        <p><strong>Topik:</strong> <?= esc($banksoal['topik_pembelajaran']) ?> | 
           <strong>Mata Pelajaran:</strong> <?= esc($banksoal['mata_pelajaran']) ?></p>
    </div>

    <!-- Tombol Tambah Soal -->
    <a href="<?= base_url('dashboard/pengajar/soal/tambah/'.$banksoal['id_banksoal']) ?>" class="btn btn-gradient btn-hover mb-3">
        <i class="bi bi-plus-circle me-2"></i> Tambah Soal
    </a>

    <!-- Daftar Soal -->
    <div class="card glass-card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-header">
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Opsi 1</th>
                            <th>Opsi 2</th>
                            <th>Opsi 3</th>
                            <th>Opsi 4</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($soal)) : ?>
                            <?php foreach($soal as $i => $s) : ?>
                                <tr class="table-row animate-row" style="animation-delay: <?= ($i+1)*0.05 ?>s;">
                                    <td><?= $i + 1 ?></td>
                                    <td><?= esc($s['isi_soal']) ?></td>
                                    <td><?= esc($s['opsi1']) ?></td>
                                    <td><?= esc($s['opsi2']) ?></td>
                                    <td><?= esc($s['opsi3']) ?></td>
                                    <td><?= esc($s['opsi4']) ?></td>
                                    <td><?= esc($s['jawaban']) ?></td>
                                    <td>
                                        <a href="<?= base_url('dashboard/pengajar/soal/edit/'.$s['id_soal']) ?>" class="btn btn-outline-warning btn-sm btn-icon" data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="<?= base_url('dashboard/pengajar/soal/delete/'.$s['id_soal']) ?>" class="btn btn-outline-danger btn-sm btn-icon" onclick="return confirm('Hapus soal ini?')" data-bs-toggle="tooltip" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-4 fst-italic text-muted">Belum ada soal</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<style>
    .glass-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(10px); border:1px solid rgba(0,123,255,0.15); border-radius:1rem;}
    .table-header th{ background:#dbe9ff;color:#0d3c91;text-transform:uppercase;font-weight:600;letter-spacing:0.5px;}
    .table-row{transition:all 0.3s ease;cursor:pointer;}
    .table-row:hover{background:#f1f7ff;transform:translateY(-2px);box-shadow:0 4px 15px rgba(0,0,0,0.05);}
    .animate-row{opacity:0;transform:translateY(15px);animation:fadeSlideIn 0.5s forwards;}
    @keyframes fadeSlideIn{to{opacity:1;transform:translateY(0);}}
    .btn-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);color:#fff;font-weight:600;transition:all 0.3s ease;border:none;}
    .btn-gradient:hover{transform: translateY(-2px);box-shadow:0 6px 15px rgba(0,123,255,0.3);}
    .btn-hover{transition:all 0.3s ease;}
    .btn-icon{border-radius:50%;padding:0.45rem;transition:all 0.3s ease;}
    .btn-icon:hover{transform:scale(1.2);}
    .header-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);-webkit-background-clip:text;color:transparent;}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var tooltipTriggerList=[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function(t){return new bootstrap.Tooltip(t)});
});
</script>

<?= $this->endSection() ?>
