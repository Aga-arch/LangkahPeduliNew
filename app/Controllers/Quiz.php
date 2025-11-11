<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Quiz extends BaseController
{
    public function index()
    {
        return view('dashboard/quiz/index');
    }

    public function start()
    {
        // contoh quiz dummy
        $quiz = [
            [
                'id' => 1,
                'pertanyaan' => 'Apa ibu kota Indonesia?',
                'opsi' => ['Bandung', 'Jakarta', 'Surabaya', 'Medan'],
                'jawaban' => 'Jakarta'
            ],
            [
                'id' => 2,
                'pertanyaan' => '2 + 2 = ?',
                'opsi' => ['3', '4', '5', '6'],
                'jawaban' => '4'
            ],
            [
                'id' => 3,
                'pertanyaan' => 'Siapa penemu lampu?',
                'opsi' => ['Edison', 'Newton', 'Tesla', 'Einstein'],
                'jawaban' => 'Edison'
            ]
        ];

        return view('dashboard/quiz/start', ['quiz' => $quiz]);
    }

    public function submit()
    {
        $answers = $this->request->getPost();
        $quiz = [
            1 => 'Jakarta',
            2 => '4',
            3 => 'Edison'
        ];

        $score = 0;
        $review = [];

        foreach ($quiz as $id => $correct) {
            $userAnswer = $answers['q'.$id] ?? null;
            $isCorrect = ($userAnswer === $correct);
            $review[] = [
                'pertanyaan' => "Pertanyaan $id",
                'jawaban_kamu' => $userAnswer,
                'jawaban_benar' => $correct,
                'status' => $isCorrect ? 'Benar' : 'Salah'
            ];
            if ($isCorrect) $score += 1;
        }

        $nilai = ($score / count($quiz)) * 100;

        return view('dashboard/quiz/review', [
            'nilai' => $nilai,
            'review' => $review
        ]);
    }

    public function review($id = null)
    {
        // simulasi halaman review (sudah ditangani di submit sebenarnya)
        return redirect()->to('/quiz');
    }
}
