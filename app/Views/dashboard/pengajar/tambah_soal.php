<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h3 class="fw-bold header-gradient mb-4">Tambah Soal - Bank Soal: <?= esc($banksoal['nama_banksoal']) ?></h3>

    <div class="card glass-card shadow-lg p-4">
        <form action="<?= base_url('dashboard/pengajar/soal/simpan/'.$banksoal['id_banksoal']) ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="isi_soal" class="form-label fw-semibold">Pertanyaan</label>
                <textarea name="isi_soal" id="isi_soal" class="form-control input-glass" required></textarea>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="opsi1" class="form-label fw-semibold">Opsi A</label>
                    <input type="text" name="opsi1" id="opsi1" class="form-control input-glass" required>
                </div>
                <div class="col-md-6">
                    <label for="opsi2" class="form-label fw-semibold">Opsi B</label>
                    <input type="text" name="opsi2" id="opsi2" class="form-control input-glass" required>
                </div>
                <div class="col-md-6">
                    <label for="opsi3" class="form-label fw-semibold">Opsi C</label>
                    <input type="text" name="opsi3" id="opsi3" class="form-control input-glass" required>
                </div>
                <div class="col-md-6">
                    <label for="opsi4" class="form-label fw-semibold">Opsi D</label>
                    <input type="text" name="opsi4" id="opsi4" class="form-control input-glass" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="jawaban" class="form-label fw-semibold">Jawaban Benar</label>
                <select name="jawaban" id="jawaban" class="form-select input-glass" required>
                    <option value="">-- Pilih Jawaban --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>

            <button type="submit" class="btn btn-gradient btn-hover mt-3">Simpan Soal</button>
            <a href="<?= base_url('dashboard/pengajar/banksoal/detail/'.$banksoal['id_banksoal']) ?>" class="btn btn-secondary btn-hover mt-3 ms-2">Kembali</a>
        </form>
    </div>
</div>

<style>
.glass-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(10px); border:1px solid rgba(0,123,255,0.15); border-radius:1rem;}
.input-glass { background: rgba(255,255,255,0.9); border:1px solid rgba(0,123,255,0.3); border-radius:0.5rem; padding:0.6rem 1rem; transition:all 0.3s ease;}
.input-glass:focus { border-color:#4facfe; box-shadow:0 0 8px rgba(79,172,254,0.4); outline:none; background: rgba(255,255,255,0.95);}
.btn-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);color:#fff;font-weight:600;transition:all 0.3s ease;border:none;}
.btn-gradient:hover{transform: translateY(-2px);box-shadow:0 6px 15px rgba(0,123,255,0.3);}
.btn-hover{transition:all 0.3s ease;}
.header-gradient{background: linear-gradient(90deg,#4facfe,#00f2fe);-webkit-background-clip:text;color:transparent;}
</style>

<?= $this->endSection() ?>
