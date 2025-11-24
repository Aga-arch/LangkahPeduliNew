<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Detail Bank Soal</h3>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>Nama Bank Soal:</strong> <?= $banksoal['nama_banksoal'] ?></p>
        <p><strong>Topik Pembelajaran:</strong> <?= $banksoal['topik_pembelajaran'] ?></p>
        <p><strong>Mata Pelajaran:</strong> <?= $banksoal['mata_pelajaran'] ?></p>
    </div>
</div>

<h4>Daftar Soal</h4>
<a href="<?= base_url('pengajar/soal/tambah/' . $banksoal['id_banksoal']) ?>" class="btn btn-success mb-2">
    Tambah Soal
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pertanyaan</th>
            <th>Jawaban Benar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($soal)) : ?>
        <tr><td colspan="4" class="text-center">Belum ada soal</td></tr>
        <?php else: ?>
            <?php $no = 1; foreach ($soal as $s) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $s['pertanyaan'] ?></td>
                <td><?= $s['jawaban_benar'] ?></td>
                <td>
                    <a href="<?= base_url('pengajar/soal/edit/' . $s['id_soal']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('pengajar/soal/delete/' . $s['id_soal']) ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus soal ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
