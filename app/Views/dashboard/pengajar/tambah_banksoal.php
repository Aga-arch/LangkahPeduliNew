<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<div class="container py-5">

    <!-- Header -->
    <h2 class="fw-bold header-gradient mb-4">Tambah Bank Soal</h2>

    <!-- Form Card -->
    <div class="card glass-card shadow-lg border-0 rounded-4 p-4">
        <form action="<?= base_url('dashboard/pengajar/banksoal/simpan') ?>" method="post">

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Bank Soal</label>
                <input type="text" name="nama_banksoal" class="form-control input-glass" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Topik Pembelajaran</label>
                <input type="text" name="topik_pembelajaran" class="form-control input-glass" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" class="form-control input-glass" required>
            </div>

            <button type="submit" class="btn btn-gradient btn-lg btn-hover mt-3">
                <i class="bi bi-save me-2"></i> Simpan
            </button>

        </form>
    </div>

</div>

<style>
    body {
        background: linear-gradient(180deg, #e0f0ff 0%, #ffffff 100%);
        font-family: 'Segoe UI', sans-serif;
    }

    /* Header gradient */
    .header-gradient {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        -webkit-background-clip: text;
        color: transparent;
    }

    /* Glass card */
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 123, 255, 0.15);
    }

    /* Inputs */
    .input-glass {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 123, 255, 0.3);
        border-radius: 0.5rem;
        padding: 0.6rem 1rem;
        transition: all 0.3s ease;
    }
    .input-glass:focus {
        border-color: #4facfe;
        box-shadow: 0 0 8px rgba(79, 172, 254, 0.4);
        outline: none;
        background: rgba(255, 255, 255, 0.9);
    }

    /* Buttons */
    .btn-gradient {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,123,255,0.3);
    }

    .btn-hover {
        transition: all 0.3s ease;
    }
</style>

<?= $this->endSection() ?>
