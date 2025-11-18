<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Detail Bank Soal</h3>

<table class="table">
    <tr>
        <th>Nama Bank Soal</th>
        <td><?= $banksoal['nama_banksoal'] ?></td>
    </tr>
    <tr>
        <th>Mata Pelajaran</th>
        <td><?= $banksoal['mata_pelajaran'] ?></td>
    </tr>
    <tr>
        <th>Topik</th>
        <td><?= $banksoal['topik_pembelajaran'] ?></td>
    </tr>
</table>

<a href="<?= base_url('dashboard/pengajar/soal/tambah/'.$banksoal['id_banksoal']) ?>" class="btn btn-primary">
    Tambah Soal ke Bank Ini
</a>

<?= $this->endSection() ?>
