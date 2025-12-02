<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h3 class="fw-bold header-gradient mb-4">Tambah Quiz</h3>
    <a href="<?= base_url('dashboard/pengajar/quiz') ?>" class="text-decoration-none mb-3 d-inline-block">&laquo; Kembali ke Daftar Quiz</a>

    <div class="card glass-card shadow-lg p-4">
        <form action="<?= base_url('dashboard/pengajar/quiz/simpan') ?>" method="post" onsubmit="return cekSoal()">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Quiz</label>
                <input type="text" name="judul_quiz" class="form-control input-glass" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control input-glass" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Waktu pengerjaan (menit)</label>
                <input type="number" name="waktu_menit" class="form-control input-glass" min="1" required>
            </div>

            <hr>
            <h5>Pilih Bank Soal</h5>
            <div class="mb-3">
                <select id="bankSelect" class="form-select input-glass">
                    <option value="">-- Pilih Bank Soal --</option>
                    <?php if(!empty($banksoal)): ?>
                        <?php foreach ($banksoal as $b): ?>
                            <option value="<?= esc($b['id_banksoal']) ?>"><?= esc($b['nama_banksoal']) ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">Tidak ada bank soal tersedia</option>
                    <?php endif; ?>
                </select>
            </div>

            <button type="button" class="btn btn-gradient btn-hover mb-3" id="btnAddBank">Tambah Bank Soal ke Quiz</button>

            <div id="listBankContainer"></div>

            <hr>
            <button type="submit" class="btn btn-primary btn-gradient btn-hover">Simpan Quiz</button>
        </form>
    </div>
</div>

<script>
let bankCount = 0;

document.getElementById("btnAddBank").onclick = function() {
    const id_bank = document.getElementById("bankSelect").value;
    if (!id_bank) {
        alert("Pilih bank soal dulu!");
        return;
    }
    bankCount++;
    const container = document.getElementById("listBankContainer");
    const blockId = "bankBlock" + bankCount;

    const html = `
    <div class="card p-3 mb-3 glass-card" id="${blockId}">
        <h6 class="fw-semibold">Bank Soal ID: ${id_bank}</h6>
        <input type="hidden" name="banksoal[]" value="${id_bank}">
        <label>Pilih jumlah soal:</label>
        <input type="number" class="form-control jumlahInput input-glass" data-bank="${id_bank}" min="1">
        <div class="mt-2 soalList" id="soalList${bankCount}"></div>
        <button type="button" class="btn btn-danger btn-hover mt-2" onclick="document.getElementById('${blockId}').remove()">Hapus</button>
    </div>
    `;
    container.insertAdjacentHTML("beforeend", html);

    loadSoal(id_bank, bankCount);
};

function loadSoal(id_bank, index) {
    fetch("<?= base_url('dashboard/pengajar/quiz/get-soal/') ?>" + id_bank, {
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": "<?= csrf_hash() ?>"
        }
    })
    .then(res => res.json())
    .then(data => {
        const listDiv = document.getElementById("soalList" + index);
        if(data && data.length > 0){
            let html = `<label>Pilih soal:</label><br>`;
            data.forEach((soal, i) => {
                const pertanyaan = soal.pertanyaan ? soal.pertanyaan : `Soal #${i+1}`;
                const id_soal = soal.id_soal ? soal.id_soal : i+1;
                html += `
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="soal_terpilih[]" value="${id_soal}" id="soal${index}_${i}">
                    <label class="form-check-label" for="soal${index}_${i}">${pertanyaan}</label>
                </div>
                `;
            });
            listDiv.innerHTML = html;
        } else {
            listDiv.innerHTML = "<em>Tidak ada soal di bank ini.</em>";
        }
    })
    .catch(() => alert("Gagal mengambil soal dari server."));
}

function cekSoal() {
    const soalDipilih = document.querySelectorAll('input[name="soal_terpilih[]"]:checked');
    if (soalDipilih.length === 0) {
        alert("Pilih minimal 1 soal sebelum menyimpan quiz!");
        return false;
    }
    return true;
}
</script>

<style>
.glass-card {
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(10px);
    border:1px solid rgba(0,123,255,0.15);
    border-radius:1rem;
}
.input-glass {
    background: rgba(255,255,255,0.9);
    border:1px solid rgba(0,123,255,0.3);
    border-radius:0.5rem;
    padding:0.5rem 1rem;
    transition:all 0.3s ease;
}
.input-glass:focus {
    border-color:#4facfe;
    box-shadow:0 0 8px rgba(79,172,254,0.4);
    outline:none;
    background: rgba(255,255,255,0.95);
}
.btn-gradient{
    background: linear-gradient(90deg,#4facfe,#00f2fe);
    color:#fff;
    font-weight:600;
    transition:all 0.3s ease;
    border:none;
}
.btn-gradient:hover{
    transform: translateY(-2px);
    box-shadow:0 6px 15px rgba(0,123,255,0.3);
}
.btn-hover{transition:all 0.3s ease;}
.header-gradient{
    background: linear-gradient(90deg,#4facfe,#00f2fe);
    -webkit-background-clip:text;
    color:transparent;
}
</style>

<?= $this->endSection() ?>
