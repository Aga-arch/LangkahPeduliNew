<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<!-- pastikan session id tersedia -->
<?php $sessionId = session()->get('id_pengajar') ?? session()->get('id'); ?>

<!-- (opsional) kalau mau pakai hidden input di sini, bungkus di form -->
<input type="hidden" name="id_pengajar" value="<?= esc($sessionId) ?>">

<h3>Bank Soal</h3>

<a href="<?= base_url('dashboard/pengajar/banksoal/tambah') ?>" class="btn btn-success mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Bank Soal
</a>

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
        <!-- pastikan variabel $banksoal ter-set dan array -->
        <?php if (!empty($banksoal) && is_array($banksoal)) : ?>
            <?php foreach ($banksoal as $i => $b) : ?>
                <tr>
                    <td><?= esc($i + 1) ?></td>
                    <td><?= esc($b['nama_banksoal'] ?? '-') ?></td>
                    <td><?= esc($b['topik_pembelajaran'] ?? '-') ?></td>
                    <td><?= esc($b['mata_pelajaran'] ?? '-') ?></td>
                    <td>
                        <!-- tombol Detail (pastikan route detail ada) -->
                        <a href="<?= base_url('dashboard/pengajar/banksoal/detail/'.$b['id_banksoal']) ?>" 
                           class="btn btn-info btn-sm">Detail</a>

                        <!-- tombol Lihat Soal (nanti arahkan ke controller Soal) -->
                        <a href="<?= base_url('dashboard/pengajar/soal/'.$b['id_banksoal']) ?>" 
                           class="btn btn-warning btn-sm">Lihat Soal</a>

                        <a href="<?= base_url('dashboard/pengajar/banksoal/edit/'.$b['id_banksoal']) ?>" 
                           class="btn btn-primary btn-sm">Edit</a>

                        <a href="<?= base_url('dashboard/pengajar/banksoal/hapus/'.$b['id_banksoal']) ?>" 
                           onclick="return confirm('Hapus bank soal?')" 
                           class="btn btn-danger btn-sm">Hapus</a>
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
