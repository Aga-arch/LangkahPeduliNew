<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Bank Soal: <?= esc($banksoal['nama_banksoal']) ?></h3>
<p><strong>Topik:</strong> <?= esc($banksoal['topik_pembelajaran']) ?> | 
   <strong>Mata Pelajaran:</strong> <?= esc($banksoal['mata_pelajaran']) ?></p>

<!-- Tombol Tambah Soal -->
<a href="<?= base_url('dashboard/pengajar/soal/tambah/'.$banksoal['id_banksoal']) ?>" class="btn btn-success mb-3">
    Tambah Soal
</a>

<!-- Daftar Soal -->
<table class="table table-bordered table-striped">
    <thead class="table-light">
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
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($s['isi_soal']) ?></td>
                    <td><?= esc($s['opsi1']) ?></td>
                    <td><?= esc($s['opsi2']) ?></td>
                    <td><?= esc($s['opsi3']) ?></td>
                    <td><?= esc($s['opsi4']) ?></td>
                    <td><?= esc($s['jawaban']) ?></td>
                    <td>
                        <a href="<?= base_url('dashboard/pengajar/soal/edit/'.$s['id_soal']) ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?= base_url('dashboard/pengajar/soal/delete/'.$s['id_soal']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus soal ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center">Belum ada soal</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<?= $this->endSection() ?>
