<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<!-- Styles khusus untuk halaman penghargaan -->
<style>
    .achievement-container {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .trophy-icon {
        font-size: 3.5rem;
        color: gold;
        text-shadow: 0 0 10px rgba(255, 215, 0, 0.7);
        animation: trophy-glow 2s infinite alternate;
    }

    @keyframes trophy-glow {
        from { text-shadow: 0 0 8px gold; }
        to { text-shadow: 0 0 20px orange; }
    }

    .achievement-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 15px;
    }

    .achievement-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(255, 193, 7, 0.3);
    }

    .badge-achieved {
        background: linear-gradient(90deg, #ffc107, #ff9800);
        color: white;
        border-radius: 8px;
        padding: 5px 10px;
        font-size: 0.85rem;
    }

    .empty-state {
        text-align: center;
        color: #aaa;
        padding: 40px 0;
        font-style: italic;
    }

    .btn-view {
        background: linear-gradient(45deg, #ffca28, #ffa000);
        border: none;
        color: white;
        border-radius: 8px;
        padding: 8px 16px;
        transition: 0.3s;
    }

    .btn-view:hover {
        background: linear-gradient(45deg, #ffb300, #ff8f00);
        transform: scale(1.05);
    }
</style>

<div class="container mt-4 achievement-container">
    <div class="text-center mb-4">
        <i class="bi bi-trophy-fill trophy-icon"></i>
        <h2 class="mt-3 fw-bold">Selamat! 🎉</h2>
        <p class="text-muted">Kamu sudah meraih beberapa pencapaian luar biasa!</p>
    </div>

    <div class="row">
        <?php if (!empty($awards)) : ?>
            <?php foreach ($awards as $award) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card achievement-card shadow-sm border-0 p-3">
                        <div class="card-body text-center">
                            <i class="bi bi-star-fill text-warning" style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3 fw-bold"><?= esc($award['nama']) ?></h5>
                            <span class="badge-achieved">🎖️ Dicapai <?= esc($award['tanggal']) ?></span>
                            <p class="mt-3 text-muted"><?= esc($award['keterangan']) ?></p>
                            <button class="btn btn-view mt-2" onclick="showAwardDetails('<?= esc($award['nama']) ?>','<?= esc($award['keterangan']) ?>','<?= esc($award['tanggal']) ?>')">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <div class="empty-state">
                    <i class="bi bi-emoji-frown" style="font-size: 2rem;"></i>
                    <p class="mt-2">Belum ada penghargaan yang diperoleh.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Detail Penghargaan -->
<div class="modal fade" id="awardModal" tabindex="-1" aria-labelledby="awardModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-warning shadow">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title fw-bold" id="awardModalLabel">Detail Penghargaan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body text-center">
        <i class="bi bi-trophy-fill text-warning" style="font-size: 3rem;"></i>
        <h4 class="mt-3" id="modalAwardName"></h4>
        <p class="text-muted" id="modalAwardDesc"></p>
        <span class="badge bg-warning text-dark" id="modalAwardDate"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Script animasi dan modal -->
<script>
    function showAwardDetails(name, desc, date) {
        document.getElementById('modalAwardName').textContent = name;
        document.getElementById('modalAwardDesc').textContent = desc;
        document.getElementById('modalAwardDate').textContent = "Diperoleh pada " + date;
        const modal = new bootstrap.Modal(document.getElementById('awardModal'));
        modal.show();
    }
</script>

<?= $this->endSection() ?>
