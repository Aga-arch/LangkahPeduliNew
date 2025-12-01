<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?? 'Dashboard Pengajar'; ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body { font-family: "Poppins", sans-serif; margin:0; background:#0a0f2c; color:#fff; overflow-x:hidden; }
* { box-sizing:border-box; }

/* ================= HEADER ================= */
header {
    background: linear-gradient(90deg,#1976d2,#42a5f5);
    color:white;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    position:fixed;
    top:0; left:0; right:0;
    z-index:100;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    transition: all 0.3s;
}
header:hover { background: linear-gradient(90deg,#42a5f5,#1976d2); }
.logo-area { display:flex; align-items:center; }
.logo-area img { height:60px; width:auto; margin-right:15px; object-fit:contain; transition: transform 0.3s; }
.logo-area img:hover { transform: rotate(10deg) scale(1.05); }
header a { color:white; text-decoration:none; margin-left:15px; transition: 0.3s; }
header a:hover { text-decoration:underline; color:#ffeb3b; }
.btn-logout { background:#ff4d4f; border:none; padding:6px 15px; border-radius:20px; color:white; transition:0.3s; }
.btn-logout:hover { background:#d9363e; transform: scale(1.05); }

/* ================= SIDEBAR ================= */
.sidebar {
    position: fixed;
    top: 70px;
    left: 0;
    width: 220px;
    height: calc(100vh - 70px);
    background: rgba(10,15,44,0.95);
    box-shadow: 2px 0 15px rgba(0,0,0,0.5);
    padding-top: 20px;
    z-index:50;
    backdrop-filter: blur(6px);
}
.sidebar a {
    display:block;
    padding:12px 20px;
    color:#fff;
    text-decoration:none;
    border-left:3px solid transparent;
    transition: all 0.3s;
    font-weight:500;
    position:relative;
}
.sidebar a::before {
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:5px;
    height:100%;
    background: linear-gradient(180deg,#42a5f5,#1976d2);
    border-radius: 0 5px 5px 0;
    opacity:0;
    transition: 0.3s;
}
.sidebar a:hover::before { opacity:1; }
.sidebar a:hover { color:#42a5f5; }
.sidebar a i { margin-right:8px; transition:0.3s; }
.sidebar a:hover i { transform: scale(1.2) rotate(20deg); }

/* ================= CONTENT ================= */
.content {
    margin-left: 240px;
    margin-top: 90px;
    padding: 25px;
    position: relative;
    z-index: 10;
}

/* ================= PIXEL HEARTS ================= */
.pixel-heart {
    position: absolute;
    width: 16px;
    height: 16px;
    background: red;
    clip-path: polygon(50% 0%, 61% 12%, 75% 12%, 85% 24%, 85% 40%, 75% 55%, 50% 80%, 25% 55%, 15% 40%, 15% 24%, 25% 12%, 39% 12%);
    opacity:0.8;
    animation: floatHeart linear infinite;
    transition: transform 0.3s;
}
.pixel-heart.explode { transform: scale(2) rotate(360deg); opacity:0; }
@keyframes floatHeart {
    0% { transform: translateY(0) scale(0.8); opacity:0; }
    20% { opacity:1; }
    100% { transform: translateY(-200px) scale(1.2); opacity:0; }
}

/* ================= POTION PARTICLE EFFECT ================= */
.potion-particle {
    position: absolute;
    width: 6px;
    height: 6px;
    border-radius:50%;
    background: linear-gradient(45deg,#8e44ad,#e74c3c);
    opacity:0.6;
    animation: floatPotion linear infinite;
}
@keyframes floatPotion {
    0% { transform: translateY(0) scale(0.5); opacity:0.5; }
    50% { transform: translateY(-50px) scale(1); opacity:0.9; }
    100% { transform: translateY(-120px) scale(0.8); opacity:0; }
}

/* ================= KOF STRIKE EFFECT ================= */
.kof-strike {
    position: absolute;
    width: 200px;
    height: 60px;
    background: linear-gradient(90deg, #fff700,#ff0000);
    clip-path: polygon(0 0,100% 0,80% 100%,0% 100%);
    opacity:0;
    transform: rotate(-15deg);
    animation: strikeEffect 0.8s ease-out forwards;
}
@keyframes strikeEffect {
    0% { opacity:0; transform: translateX(0) rotate(-15deg) scale(0); }
    50% { opacity:1; transform: translateX(50px) rotate(-15deg) scale(1.2); }
    100% { opacity:0; transform: translateX(100px) rotate(-15deg) scale(1); }
}

/* ================= CURSOR NEON ================= */
.cursor-hover {
    position:absolute;
    width:8px;
    height:8px;
    border-radius:50%;
    pointer-events:none;
    background: linear-gradient(45deg,#42a5f5,#1976d2,#ffffff);
    box-shadow: 0 0 8px #42a5f5,0 0 16px #1976d2,0 0 24px #ffffff;
    opacity:0.8;
    animation: floatCursor 1s infinite alternate;
}
@keyframes floatCursor {
    0% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-4px) scale(1.3); }
    100% { transform: translateY(0) scale(1); }
}

/* ================= BUTTON & CARD EFFECT ================= */
.btn-primary, .btn-success, .btn-warning, .btn-danger {
    transition: 0.3s;
    position: relative;
    overflow: hidden;
}
.btn-primary:hover, .btn-success:hover, .btn-warning:hover, .btn-danger:hover {
    transform: scale(1.08) rotate(-1deg);
    box-shadow: 0 0 18px rgba(66,165,245,0.8);
}
.btn-primary::after, .btn-success::after, .btn-warning::after, .btn-danger::after {
    content:"";
    position:absolute;
    width:100%;
    height:100%;
    top:0; left:-100%;
    background: rgba(255,255,255,0.2);
    transition: all 0.5s;
}
.btn-primary:hover::after, .btn-success:hover::after, .btn-warning:hover::after, .btn-danger:hover::after {
    left:0;
}
.card { transition: transform 0.5s ease, box-shadow 0.5s ease; }
.card:hover { transform: translateY(-5px) scale(1.03); box-shadow:0 15px 35px rgba(66,165,245,0.6); }

</style>
</head>
<body>

<header>
    <div class="logo-area">
        <img src="<?= base_url('../images/Logo.png') ?>" alt="Logo">
        <h1><i class="bi bi-person-badge-fill me-2"></i>Hallo <?= esc(session()->get('username')) ?></h1>
    </div>
    <div class="d-flex align-items-center">
        <a href="<?= base_url('dashboard/profil') ?>"><i class="bi bi-person-circle me-1"></i><?= session()->get('username') ?></a>
        <a href="<?= base_url('logout') ?>" class="btn-logout"><i class="bi bi-box-arrow-right me-1"></i> Logout</a>
    </div>
</header>

<div class="sidebar">
    <a href="<?= base_url('dashboard/pengajar/materi') ?>"><i class="bi bi-calendar2-fill me-2"></i>Kelola Materi</a>
    <a href="<?= base_url('dashboard/pengajar/quiz') ?>"><i class="bi bi-journal-text me-2"></i>Kelola Quiz</a>
    <a href="<?= base_url('dashboard/pengajar/banksoal') ?>"><i class="bi bi-collection me-2"></i>Kelola Bank Soal</a>
    <div id="heartContainer" style="position:absolute; bottom:10px; width:100%;"></div>
</div>

<div id="potionContainer"></div>
<div class="content">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ================= PIXEL HEARTS =================
const heartContainer = document.getElementById('heartContainer');
for(let i=0;i<30;i++){
    const heart=document.createElement('div');
    heart.className='pixel-heart';
    heart.style.left=Math.random()*180+'px';
    heart.style.animationDuration=(2+Math.random()*3)+'s';
    heart.style.animationDelay=(Math.random()*2)+'s';
    heartContainer.appendChild(heart);
}

// Explode hearts on sidebar hover
document.querySelectorAll('.sidebar a').forEach(a=>{
    a.addEventListener('mouseenter', ()=>{
        const hearts = document.querySelectorAll('.pixel-heart');
        hearts.forEach(h=>{
            h.classList.add('explode');
            setTimeout(()=>{ h.classList.remove('explode'); },300);
        });
    });
});

// ================= POTION PARTICLE =================
const potionContainer = document.getElementById('potionContainer');
for(let i=0;i<50;i++){
    const p=document.createElement('div');
    p.className='potion-particle';
    p.style.left=Math.random()*window.innerWidth+'px';
    p.style.top=Math.random()*window.innerHeight+'px';
    p.style.background = `hsl(${Math.random()*360},80%,60%)`;
    p.style.animationDuration=(2+Math.random()*3)+'s';
    p.style.animationDelay=(Math.random()*2)+'s';
    potionContainer.appendChild(p);
}

// ================= KOF STRIKE EFFECT =================
function kofStrike() {
    const strike = document.createElement('div');
    strike.className='kof-strike';
    strike.style.top=(100 + Math.random()*400)+'px';
    strike.style.left=(-200 + Math.random()*200)+'px';
    document.body.appendChild(strike);
    // Shake effect
    strike.animate([
        {transform:'translateX(0px) rotate(-15deg)'},
        {transform:'translateX(5px) rotate(-15deg)'},
        {transform:'translateX(-5px) rotate(-15deg)'},
        {transform:'translateX(0px) rotate(-15deg)'}
    ], {duration:200, iterations:3});
    setTimeout(()=>{ strike.remove(); },1000);
}
setInterval(kofStrike,5000);

// ================= CURSOR NEON =================
document.addEventListener('mousemove', e=>{
    for(let i=0;i<2;i++){ // trail effect
        const cursor = document.createElement('div');
        cursor.className='cursor-hover';
        cursor.style.left=(e.clientX + Math.random()*4 -2)+'px';
        cursor.style.top=(e.clientY + Math.random()*4 -2)+'px';
        document.body.appendChild(cursor);
        setTimeout(()=>{ cursor.remove(); },700);
    }
});
</script>
</body>
</html>
