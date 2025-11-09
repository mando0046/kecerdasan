<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;
use App\Models\ExamAttempt;

class PesertaController extends Controller
{
    // ================== 🧾 Daftar Peserta (Admin) ==================
    public function daftar()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.peserta', compact('users'));
    }

    // ================== 🏠 Dashboard Peserta ==================
    public function index()
    {
        $user = Auth::user();

        // Hitung jumlah ujian yang sudah dilakukan peserta
        $examCount = ExamAttempt::where('user_id', $user->id)->count();

        // Batas maksimal ujian
        $maxAttempts = 3; // ganti sesuai kebutuhan

        // Sudah pernah ujian?
        $hasTakenExam = ExamAttempt::where('user_id', $user->id)
            ->where('finished', true)
            ->exists();

        return view('peserta.dashboard', compact(
            'examCount',
            'maxAttempts',
            'hasTakenExam'
        ));
    }

    // ================== 🧩 Halaman Ujian ==================
    public function ujian(Request $request)
    {
        $userId = Auth::id();

        // Ambil semua ujian aktif
        $exams = Exam::where('is_active', true)->get();
        $examId = $request->get('exam_id');
        $selectedExam = null;
        $questions = collect();

        // Jika peserta sudah mencapai batas attempt
        $attempts = ExamAttempt::where('user_id', $userId)->count();
        if ($attempts >= 3) {
            return redirect()->route('peserta.dashboard')
                ->with('error', 'Anda sudah mencapai batas maksimal 5 kali ujian.');
        }

        // Jika peserta memilih ujian tertentu
        if ($examId) {
            $selectedExam = Exam::find($examId);
            if (!$selectedExam) {
                return redirect()->route('peserta.ujian')->with('error', 'Ujian tidak ditemukan.');
            }

            // Buat record attempt baru
            $attempt = ExamAttempt::create([
                'user_id'        => $userId,
                'exam_id'        => $examId,
                'total_questions'=> $selectedExam->total_questions ?? 0,
                'correct_answer' => 0,
                'wrong_answer'   => 0,
                'score'          => 0,
                'started_at'     => now(),
                'finished_at'    => null,
            ]);

            // Ambil semua soal dari ujian terpilih
            $questions = Question::where('exam_id', $examId)->get();
        }

        $duration = $selectedExam->duration ?? 60;

        return view('peserta.ujian', compact('exams', 'questions', 'selectedExam', 'duration'));
    }

    // ================== 🔁 Load Soal (AJAX) ==================
    public function showAjax(Request $request)
    {
        $index = (int) $request->query('index', 0);
        $examId = (int) $request->query('exam_id', 0);

        $soal = Question::where('exam_id', $examId)->skip($index)->take(1)->first();

        if (!$soal) {
            return response("<div class='text-red-600 font-bold'>Soal tidak ditemukan.</div>", 404);
        }

        return view('peserta.partials.soal', compact('soal'));
    }

    // ================== 💾 Simpan Jawaban Sementara ==================
    public function saveAnswer(Request $request)
    {
        $request->validate([
            'question_id' => 'required|integer',
            'answer' => 'required|string',
        ]);

        $userId = Auth::id();
        $question = Question::find($request->question_id);

        if (!$question) {
            return response()->json(['status' => 'error', 'message' => 'Soal tidak ditemukan.']);
        }

        $isCorrect = strtolower(trim($request->answer)) === strtolower(trim($question->answer)) ? 1 : 0;

        Answer::updateOrCreate(
            [
                'user_id' => $userId,
                'question_id' => $question->id,
            ],
            [
                'answer' => strtolower(trim($request->answer)),
                'is_correct' => $isCorrect,
            ]
        );

        return response()->json(['status' => 'ok']);
    }

    // ================== ✅ Submit Ujian ==================
    public function submit(Request $request)
    {
        $userId = Auth::id();
        $attempt = ExamAttempt::where('user_id', $userId)->latest()->first();

        if (!$attempt) {
            return response()->json(['status' => 'error', 'message' => 'Attempt tidak ditemukan.']);
        }

        $answers = Answer::where('user_id', $userId)
            ->whereIn('question_id', Question::where('exam_id', $attempt->exam_id)->pluck('id'))
            ->get();

        $total = $answers->count();
        $benar = $answers->where('is_correct', 1)->count();
        $salah = $total - $benar;
        $score = $total > 0 ? round(($benar / $total) * 100, 2) : 0;

        $attempt->update([
            'correct_answer' => $benar,
            'wrong_answer'   => $salah,
            'score'          => $score,
            'finished_at'    => now(),
            'updated_at'     => now(),
        ]);

        return response()->json([
            'status'  => 'ok',
            'message' => 'Ujian berhasil disubmit!',
            'score'   => $score,
        ]);
    }

    // ================== 📊 Hasil Ujian ==================
    public function hasil()
    {
        $user = Auth::user();

        $attempt = ExamAttempt::where('user_id', $user->id)->latest()->first();

        if (!$attempt) {
            return redirect()->route('peserta.dashboard')->with('error', 'Belum ada hasil ujian.');
        }

        $answers = Answer::with('question')
            ->where('user_id', $user->id)
            ->whereIn('question_id', Question::where('exam_id', $attempt->exam_id)->pluck('id'))
            ->get();

        $totalSoal = $answers->count();
        $benar = $answers->where('is_correct', 1)->count();
        $salah = $totalSoal - $benar;
        $belumDijawab = Question::where('exam_id', $attempt->exam_id)->count() - $answers->count();
        $nilaiAkhir = $totalSoal > 0 ? round(($benar / $totalSoal) * 100, 2) : 0;

        return view('peserta.hasil', compact(
            'user',
            'answers',
            'attempt',
            'benar',
            'salah',
            'belumDijawab',
            'nilaiAkhir'
        ));
    }
}
