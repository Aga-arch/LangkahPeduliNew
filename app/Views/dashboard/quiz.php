<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<style>
/* Animasi umum */
.fade-in {
  animation: fadeIn 0.8s ease-in-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); opacity: 0; }
  to { opacity: 1; transform: translateY(0); opacity: 1; }
}

/* Kartu quiz */
.quiz-card {
  border: none;
  border-radius: 16px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background: linear-gradient(135deg, #fff, #f9fafb);
}
.quiz-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 8px 20px rgba(0, 123, 255, 0.25);
}

/* Tombol */
.btn-start {
  background: linear-gradient(45deg, #2196f3, #21cbf3);
  border: none;
  color: white;
  border-radius: 8px;
  transition: 0.3s;
}
.btn-start:hover {
  background: linear-gradient(45deg, #1e88e5, #00bcd4);
  transform: scale(1.05);
}

/* Modal quiz */
.question {
  background: #f8f9fa;
  padding: 12px 16px;
  border-radius: 10px;
  margin-bottom: 15px;
  transition: background 0.3s;
}
.question:hover {
  background: #e3f2fd;
}

/* Hasil quiz */
.result-box {
  background: linear-gradient(145deg, #e3f2fd, #ffffff);
  border-radius: 12px;
  padding: 25px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
.result-box h3 {
  color: #007bff;
  font-weight: bold;
}
.result-box p {
  margin: 8px 0;
  color: #444;
}
.correct { color: #27ae60; font-weight: bold; }
.wrong { color: #e74c3c; font-weight: bold; }
</style>

<div class="container mt-4 fade-in">
  <div class="text-center mb-4">
    <i class="bi bi-question-circle-fill text-primary" style="font-size: 3rem;"></i>
    <h2 class="fw-bold mt-2">Quiz Seru 🧠</h2>
    <p class="text-muted">Uji pengetahuanmu dan dapatkan skor terbaik!</p>
  </div>

  <div class="row" id="quizList">
    <!-- Simulasi quiz -->
    <?php 
    $quizzes = [
      ['judul' => 'Fashion Style Dasar', 'deskripsi' => 'Tes pemahaman tentang gaya dan warna busana.', 'jumlah' => 5],
      ['judul' => 'Teknik Menjahit', 'deskripsi' => 'Uji kemampuan dalam teknik dasar menjahit.', 'jumlah' => 5],
    ];
    foreach ($quizzes as $quiz): ?>
      <div class="col-md-4 mb-4">
        <div class="card quiz-card p-3 h-100 text-center">
          <i class="bi bi-patch-question-fill text-info" style="font-size: 2.5rem;"></i>
          <h5 class="fw-bold mt-3"><?= esc($quiz['judul']) ?></h5>
          <p class="text-muted"><?= esc($quiz['deskripsi']) ?></p>
          <p><span class="badge bg-primary"><?= esc($quiz['jumlah']) ?> Soal</span></p>
          <button class="btn btn-start mt-auto" onclick="startQuiz('<?= esc($quiz['judul']) ?>')">
            Mulai Quiz
          </button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Kotak hasil quiz -->
  <div id="resultContainer" class="fade-in mt-4" style="display: none;">
    <div class="result-box">
      <h3>🎉 Hasil Quiz Kamu</h3>
      <p id="scoreText"></p>
      <div id="reviewContainer" class="mt-3 text-start"></div>
      <button class="btn btn-primary mt-3" onclick="resetQuiz()">Kembali ke Daftar Quiz</button>
    </div>
  </div>
</div>

<!-- Modal untuk mengerjakan quiz -->
<div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="quizModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-primary shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="quizModalLabel">Mengerjakan Quiz</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="quizForm">
          <!-- Soal-soal -->
          <div class="question">
            <p class="fw-bold mb-1">1. Apa yang dimaksud dengan warna monokromatik?</p>
            <div class="form-check"><input class="form-check-input" type="radio" name="q1" value="a"> Kombinasi warna yang kontras</div>
            <div class="form-check"><input class="form-check-input" type="radio" name="q1" value="b"> Satu warna dengan berbagai gradasi</div>
            <div class="form-check"><input class="form-check-input" type="radio" name="q1" value="c"> Campuran dua warna cerah</div>
          </div>

          <div class="question">
            <p class="fw-bold mb-1">2. Alat utama yang digunakan untuk menjahit manual adalah?</p>
            <div class="form-check"><input class="form-check-input" type="radio" name="q2" value="a"> Mesin obras</div>
            <div class="form-check"><input class="form-check-input" type="radio" name="q2" value="b"> Jarum dan benang</div>
            <div class="form-check"><input class="form-check-input" type="radio" name="q2" value="c"> Gunting kain</div>
          </div>

          <div class="question">
            <p class="fw-bold mb-1">3. Kain katun cocok digunakan untuk?</p>
            <div class="form-check"><input class="form-check-input" type="radio" name="q3" value="a"> Pakaian formal musim dingin</div>
            <div class="form-check"><input class="form-check-input" type="radio" name="q3" value="b"> Pakaian santai dan sejuk</div>
            <div class="form-check"><input class="form-check-input" type="radio" name="q3" value="c"> Bahan keras seperti tas kulit</div>
          </div>

          <div class="text-end">
            <button type="button" class="btn btn-success mt-3" onclick="submitQuiz()">Kumpulkan Jawaban</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const correctAnswers = {
  q1: "b",
  q2: "b",
  q3: "b"
};

function startQuiz(title) {
  document.getElementById('quizModalLabel').textContent = "Quiz: " + title;
  const quizModal = new bootstrap.Modal(document.getElementById('quizModal'));
  quizModal.show();
}

function submitQuiz() {
  const form = document.getElementById('quizForm');
  let score = 0, total = Object.keys(correctAnswers).length;
  let reviewHtml = "";

  for (let q in correctAnswers) {
    const userAnswer = form.querySelector(`input[name="${q}"]:checked`);
    const answerValue = userAnswer ? userAnswer.value : null;

    if (answerValue === correctAnswers[q]) {
      score++;
      reviewHtml += `<p>✅ <span class='correct'>${q.toUpperCase()} benar!</span></p>`;
    } else {
      reviewHtml += `<p>❌ <span class='wrong'>${q.toUpperCase()} salah</span> (Jawaban benar: ${correctAnswers[q].toUpperCase()})</p>`;
    }
  }

  const quizModal = bootstrap.Modal.getInstance(document.getElementById('quizModal'));
  quizModal.hide();

  setTimeout(() => {
    document.getElementById('quizList').style.display = 'none';
    document.getElementById('resultContainer').style.display = 'block';
    document.getElementById('scoreText').innerHTML = `Skor kamu: <b>${score} / ${total}</b>`;
    document.getElementById('reviewContainer').innerHTML = reviewHtml;
  }, 500);
}

function resetQuiz() {
  document.getElementById('resultContainer').style.display = 'none';
  document.getElementById('quizList').style.display = 'flex';
  document.getElementById('quizForm').reset();
}
</script>

<?= $this->endSection() ?>
