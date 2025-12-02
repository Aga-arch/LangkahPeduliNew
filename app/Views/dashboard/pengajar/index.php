<?= $this->extend('layout/dashboard_pengajar') ?>
<?= $this->section('content') ?>

<h2>Selamat Datang, <?= esc(session()->get('username')) ?>!</h2>
<p>Ini adalah dashboard pengajar Anda. Dari sini Anda dapat mengelola materi, quiz, dan bank soal dengan mudah.</p>

<div class="row mt-4">
    <!-- Card Materi -->
    <div class="col-md-4 mb-3">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-calendar2-fill me-2"></i>Materi</h5>
                <p class="card-text">Kelola semua materi pembelajaran Anda.</p>
                <a href="<?= base_url('dashboard/pengajar/materi') ?>" class="btn btn-primary">Buka Materi</a>
            </div>
        </div>
    </div>
    <!-- Card Quiz -->
    <div class="col-md-4 mb-3">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-journal-text me-2"></i>Quiz</h5>
                <p class="card-text">Kelola semua quiz dan evaluasi siswa.</p>
                <a href="<?= base_url('dashboard/pengajar/quiz') ?>" class="btn btn-success">Buka Quiz</a>
            </div>
        </div>
    </div>
    <!-- Card Bank Soal -->
    <div class="col-md-4 mb-3">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-collection me-2"></i>Bank Soal</h5>
                <p class="card-text">Kelola semua bank soal yang tersedia.</p>
                <a href="<?= base_url('dashboard/pengajar/banksoal') ?>" class="btn btn-warning">Buka Bank Soal</a>
            </div>
        </div>
    </div>
</div>

<!-- Animasi tambahan: Heart & Potion di dashboard index -->
<div id="indexHeartContainer" style="position:absolute; bottom:10px; width:100%;"></div>
<div id="indexPotionContainer"></div>

<script>
// PIXEL HEARTS DI DASHBOARD
const indexHeartContainer = document.getElementById('indexHeartContainer');
for(let i=0;i<20;i++){
    const heart = document.createElement('div');
    heart.className='pixel-heart';
    heart.style.left = Math.random()*180+'px';
    heart.style.animationDuration = (2+Math.random()*3)+'s';
    heart.style.animationDelay = (Math.random()*2)+'s';
    indexHeartContainer.appendChild(heart);
}

// POTION PARTICLE DI DASHBOARD
const indexPotionContainer = document.getElementById('indexPotionContainer');
for(let i=0;i<40;i++){
    const p = document.createElement('div');
    p.className='potion-particle';
    p.style.left = Math.random()*window.innerWidth+'px';
    p.style.top = Math.random()*window.innerHeight+'px';
    p.style.animationDuration = (2+Math.random()*3)+'s';
    p.style.animationDelay = (Math.random()*2)+'s';
    indexPotionContainer.appendChild(p);
}
</script>

<?= $this->endSection() ?>
