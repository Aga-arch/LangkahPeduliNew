<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Bank Soal</h3>

<a href="<?= base_url('pengajar/banksoal/tambah') ?>" class="btn btn-success mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Soal Baru
</a>
   


<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($banksoal)): ?>
            <?php foreach($banksoal as $index => $row): ?>
            <tr>
                <td><?= $index+1 ?></td>
                <td><?= esc($row['pertanyaan']) ?></td>
                <td><?= esc($row['jawaban']) ?></td>
                <td>
                    <a href="<?= base_url('pengajar/banksoal/edit/'.$row['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="<?= base_url('pengajar/banksoal/hapus/'.$row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus soal ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Belum ada soal</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
