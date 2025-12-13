<?= $this->extend('layout/layout_penerima') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h2 class="fw-bold mb-3"><?= esc($quiz['judul_quiz']) ?></h2>
    <p class="text-muted">Waktu pengerjaan: <?= esc($quiz['waktu_menit']) ?> menit</p>

    <form action="<?= base_url('dashboard/penerima/quiz/kumpul/' . $quiz['id_quiz']) ?>" 
          method="post">
        <?= csrf_field() ?>

        <?php if (empty($soal)): ?>
            <div class="alert alert-warning">
                Belum ada soal pada quiz ini.
            </div>
        <?php else: ?>

            <?php foreach ($soal as $index => $s): ?>
                <div class="card mb-3 shadow-sm p-3">

                    <h5><?= $index + 1 ?>. <?= esc($s['isi_soal']) ?></h5>

                    <div class="mt-2">
                        <label>
                            <input type="radio" 
                                   name="jawaban[<?= $s['id_soal'] ?>]" 
                                   value="opsi1">
                            <?= esc($s['opsi1']) ?>
                        </label><br>

                        <label>
                            <input type="radio" 
                                   name="jawaban[<?= $s['id_soal'] ?>]" 
                                   value="opsi2">
                            <?= esc($s['opsi2']) ?>
                        </label><br>

                        <label>
                            <input type="radio" 
                                   name="jawaban[<?= $s['id_soal'] ?>]" 
                                   value="opsi3">
                            <?= esc($s['opsi3']) ?>
                        </label><br>

                        <label>
                            <input type="radio" 
                                   name="jawaban[<?= $s['id_soal'] ?>]" 
                                   value="opsi4">
                            <?= esc($s['opsi4']) ?>
                        </label>
                    </div>

                </div>
            <?php endforeach; ?>

            <button class="btn btn-primary mt-3">Kumpulkan Jawaban</button>

            <a href="<?= base_url('dashboard/penerima/quiz/' . $quiz['id_quiz']) ?>" 
               class="btn btn-secondary ms-2 mt-3">
                Kembali
            </a>

        <?php endif; ?>
    </form>
</div>

<?= $this->endSection() ?>
