<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Kelola Quiz</h3>

<a href="<?= base_url('dashboard/pengajar/quiz/tambah') ?>" class="btn btn-primary mb-3">
    Tambah Quiz
</a>

<table class="table table-bordered table-striped">
    <thead>
      <tr>
    <th width="5%">ID</th>
    <th>Judul Quiz</th>
    <th>Deskripsi</th>
    <th width="10%">Waktu</th>
    <th width="20%">Aksi</th>
</tr>

    </thead>

    <tbody>
        <?php if (!empty($quiz)) : ?>
            <?php foreach ($quiz as $q): ?>
                <tr>
                    <td><?= $q['id_quiz'] ?></td>
                    <td><?= esc($q['judul_quiz']) ?></td>
                    <td><?= esc($q['deskripsi']) ?></td>
                    <td><?= $q['waktu_menit'] ?> menit</td>
                    <td>
                        <a href="<?= base_url('dashboard/pengajar/quiz/detail/'.$q['id_quiz']) ?>" class="btn btn-info btn-sm">Cek</a>
                        <a href="<?= base_url('dashboard/pengajar/quiz/edit/'.$q['id_quiz']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('dashboard/pengajar/quiz/hapus/'.$q['id_quiz']) ?>" onclick="return confirm('Hapus quiz ini?')" class="btn btn-danger btn-sm">Hapus</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada quiz dibuat.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
