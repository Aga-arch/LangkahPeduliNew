<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h3>Tambah Quiz</h3>
<a href="<?= base_url('dashboard/pengajar/quiz') ?>">&laquo; Kembali ke Daftar Quiz</a>

<form action="<?= base_url('dashboard/pengajar/quiz/simpan') ?>" method="post" onsubmit="return cekSoal()">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label>Nama Quiz</label>
        <input type="text" name="judul_quiz" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label>Waktu pengerjaan (menit)</label>
        <input type="number" name="waktu_menit" class="form-control" min="1" required>
    </div>

    <hr>
    <h5>Pilih Bank Soal</h5>

    <div class="mb-3">
        <select id="bankSelect" class="form-control">
            <option value="">-- Pilih Bank Soal --</option>
            <?php foreach ($banksoal as $b): ?>
                <option value="<?= $b['id_banksoal'] ?>"><?= esc($b['nama_banksoal']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="button" class="btn btn-success mb-3" id="btnAddBank">Tambah Bank Soal ke Quiz</button>

    <div id="listBankContainer"></div>

    <hr>
    <button type="submit" class="btn btn-primary">Simpan Quiz</button>
</form>

<script>
let bankCount = 0;

document.getElementById("btnAddBank").onclick = function() {
    let id_bank = document.getElementById("bankSelect").value;
    if (id_bank === "") {
        alert("Pilih bank soal dulu!");
        return;
    }

    bankCount++;
    let container = document.getElementById("listBankContainer");
    let blockId = "bankBlock" + bankCount;

    let html = `
        <div class="card p-3 mb-3" id="${blockId}">
            <h6>Bank Soal ID: ${id_bank}</h6>
            <input type="hidden" name="banksoal[]" value="${id_bank}">

            <label>Pilih jumlah soal:</label>
            <input type="number" class="form-control jumlahInput" data-bank="${id_bank}" min="1">

            <div class="mt-2 soalList" id="soalList${bankCount}"></div>

            <button type="button" class="btn btn-danger mt-2"
                onclick="document.getElementById('${blockId}').remove()">
                Hapus
            </button>
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
        let listDiv = document.getElementById("soalList" + index);
        let html = "<label>Pilih soal:</label><br>";

        data.forEach(soal => {
            html += `
                <div>
                    <input type="checkbox" name="soal_terpilih[]" value="${soal.id_soal}">
                    ${soal.pertanyaan}
                </div>
            `;
        });

        listDiv.innerHTML = html;
    })
    .catch(() => alert("Gagal mengambil soal dari server."));
}


// Validasi sebelum simpan quiz
function cekSoal() {
    const soalDipilih = document.querySelectorAll('input[name="soal_terpilih[]"]:checked');
    if (soalDipilih.length === 0) {
        alert("Pilih minimal 1 soal sebelum menyimpan quiz!");
        return false;
    }
    return true;
}
</script>

<?= $this->endSection() ?>
