<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Daftar Bank Soal</h3>

<!-- Tombol Tambah Bank Soal -->
<div class="mb-3">
    <a href="<?= base_url('dashboard/pengajar/banksoal/tambah') ?>" class="btn btn-success">Tambah Bank Soal</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Bank Soal</th>
            <th>Topik</th>
            <th>Mata Pelajaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($banksoal)) : ?>
            <?php foreach ($banksoal as $i => $b) : ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($b['nama_banksoal']) ?></td>
                    <td><?= esc($b['topik_pembelajaran']) ?></td>
                    <td><?= esc($b['mata_pelajaran']) ?></td>
                    <td>
                        <!-- Tombol Detail / Cek -->
                        <a href="<?= base_url('dashboard/pengajar/banksoal/detail/'.$b['id_banksoal']) ?>" class="btn btn-info btn-sm">Detail</a>
                        
                        <a href="<?= base_url('dashboard/pengajar/banksoal/edit/'.$b['id_banksoal']) ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?= base_url('dashboard/pengajar/banksoal/hapus/'.$b['id_banksoal']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus bank soal ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada bank soal</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<?= $this->endSection() ?>
