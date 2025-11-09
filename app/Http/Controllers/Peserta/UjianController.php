<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UjianController extends Controller
{
    /**
     * 🏠 Halaman utama ujian — peserta memilih jenis ujian
     */
    public function index(Request $request)
    {
        $exams = Exam::where('is_active', true)->orderBy('id')->get();

        // Ambil exam_id dari parameter atau session
        $selectedExamId = $request->get('exam_id') ?? session('selected_exam_id');
        $exam = $selectedExamId ? Exam::find($selectedExamId) : null;

        // Jika belum pilih ujian
        if (!$exam) {
            return view('peserta.partials.pilih-ujian', compact('exams'));
        }

        $userId = Auth::id();

        // Cek attempt aktif untuk ujian ini
        $attempt = ExamAttempt::where('user_id', $userId)
            ->where('exam_id', $exam->id)
            ->whereNull('finished_at')
            ->latest('id')
            ->first();

        // Buat attempt baru kalau belum ada
        if (!$attempt) {
            $attempt = ExamAttempt::create([
                'user_id' => $userId,
                'exam_id' => $exam->id,
                'total_questions' => $exam->total_questions,
                'correct_answer' => 0,
                'wrong_answer' => 0,
                'score' => 0,
                'started_at' => now(),
            ]);
        }

        // Simpan ke session
        session([
            'attempt_id' => $attempt->id,
            'selected_exam_id' => $exam->id,
        ]);

        // Ambil soal berdasarkan exam_id
        $questionIds = Question::where('exam_id', $exam->id)
            ->pluck('id')
            ->toArray();

        // Jika belum ada soal
        if (empty($questionIds)) {
            return view('peserta.partials.ujian', [
                'exam' => $exam,
                'attempt' => $attempt,
                'questions' => [],
                'exams' => $exams,
                'message' => '⚠️ Soal untuk ujian ini belum tersedia.',
            ]);
        }

        // Acak urutan sekali per attempt
        if (!Session::has("question_order_{$attempt->id}")) {
            shuffle($questionIds);
            Session::put("question_order_{$attempt->id}", $questionIds);
        }

        $orderedIds = Session::get("question_order_{$attempt->id}");

        // Ambil soal sesuai urutan
        $questions = Question::whereIn('id', $orderedIds)
            ->orderByRaw('FIELD(id, ' . implode(',', $orderedIds) . ')')
            ->get();

        // Batasi jumlah soal sesuai total_questions exam
        if ($questions->count() > $exam->total_questions) {
            $questions = $questions->take($exam->total_questions);
        }

        return view('peserta.partials.ujian', compact('exam', 'attempt', 'questions', 'exams'));
    }

    /**
     * 🚀 Halaman untuk memilih jenis ujian
     */
    public function pilih()
    {
        $exams = Exam::where('is_active', true)->get();
        return view('peserta.partials.pilih-ujian', compact('exams'));
    }

    /**
     * 🚀 Mulai ujian baru
     */
    public function mulaiBaru(Request $request)
    {
        $request->validate(['exam_id' => 'required|exists:exams,id']);

        $exam = Exam::find($request->exam_id);
        $userId = Auth::id();

        // Tutup attempt lama yang belum selesai
        ExamAttempt::where('user_id', $userId)
            ->where('exam_id', $exam->id)
            ->whereNull('finished_at')
            ->update(['finished_at' => now()]);

        // Buat attempt baru
        $attempt = ExamAttempt::create([
            'user_id' => $userId,
            'exam_id' => $exam->id,
            'total_questions' => $exam->total_questions,
            'correct_answer' => 0,
            'wrong_answer' => 0,
            'score' => 0,
            'started_at' => now(),
        ]);

        session([
            'attempt_id' => $attempt->id,
            'selected_exam_id' => $exam->id,
        ]);

        return redirect()->route('peserta.ujian.index', ['exam_id' => $exam->id])
            ->with('success', '✅ Ujian baru dimulai. Selamat mengerjakan!');
    }

    /**
     * 🔄 Load soal via AJAX
     */
    public function showAjax(Request $request)
    {
        $index = (int) $request->get('index', 0);
        $examId = $request->get('exam_id') ?? session('selected_exam_id');
        $attemptId = session('attempt_id');

        if (!$attemptId || !$examId) {
            return response('<div class="text-red-500">❌ Attempt atau ujian tidak ditemukan</div>', 404);
        }

        $orderedIds = Session::get("question_order_{$attemptId}");
        if (!$orderedIds || !isset($orderedIds[$index])) {
            return response('<div class="text-gray-500">⚠️ Soal belum tersedia.</div>', 200);
        }

        $questionId = $orderedIds[$index];
        $question = Question::where('id', $questionId)
            ->where('exam_id', $examId)
            ->first();

        if (!$question) {
            return response('<div class="text-red-500">❌ Soal tidak valid untuk ujian ini</div>', 404);
        }

        $answer = Answer::where('user_id', Auth::id())
            ->where('question_id', $question->id)
            ->where('attempt_number', $attemptId)
            ->first();

        return view('peserta.partials.soal-ajax', compact('question', 'index', 'answer'));
    }

    /**
     * 💾 Simpan jawaban peserta
     */
    public function saveAnswer(Request $request)
    {
        $request->validate([
            'question_id' => 'required|integer|exists:questions,id',
            'answer' => 'required|string|max:1',
            'exam_id' => 'required|exists:exams,id',
        ]);

        $user = Auth::user();
        $attemptId = session('attempt_id');

        if (!$attemptId) {
            return response()->json(['status' => 'error', 'message' => 'Attempt tidak ditemukan.']);
        }

        $question = Question::find($request->question_id);
        if (!$question || $question->exam_id != $request->exam_id) {
            return response()->json(['status' => 'error', 'message' => 'Soal tidak sesuai dengan ujian.']);
        }

        Answer::updateOrCreate(
            [
                'user_id' => $user->id,
                'question_id' => $request->question_id,
                'attempt_number' => $attemptId,
            ],
            [
                'answer' => strtolower($request->answer),
                'updated_at' => now(),
            ]
        );

        return response()->json(['status' => 'ok']);
    }

    /**
     * ✅ Submit ujian dan simpan skor
     */
    public function submit(Request $request)
    {
        $user = Auth::user();
        $attemptId = session('attempt_id');

        if (!$attemptId) {
            return response()->json(['status' => 'error', 'message' => 'Attempt tidak ditemukan.']);
        }

        $examAttempt = ExamAttempt::find($attemptId);
        if (!$examAttempt) {
            return response()->json(['status' => 'error', 'message' => 'Data attempt tidak valid.']);
        }

        $exam = $examAttempt->exam;
        $answers = Answer::where('user_id', $user->id)
            ->where('attempt_number', $attemptId)
            ->get();

        $correct = 0;
        foreach ($answers as $ans) {
            $question = Question::find($ans->question_id);
            if ($question && strtolower($question->answer) === strtolower($ans->answer)) {
                $correct++;
                $ans->update(['is_correct' => 1]);
            } else {
                $ans->update(['is_correct' => 0]);
            }
        }

        $total = $examAttempt->total_questions ?: Question::where('exam_id', $exam->id)->count();
        $wrong = $total - $correct;
        $score = $total > 0 ? round(($correct / $total) * 100, 2) : 0;

        $examAttempt->update([
            'correct_answer' => $correct,
            'wrong_answer' => $wrong,
            'score' => $score,
            'finished_at' => now(),
        ]);

        Score::create([
            'user_id' => $user->id,
            'exam_id' => $exam->id,
            'attempt_number' => $examAttempt->id,
            'correct_answers' => $correct,
            'total_questions' => $total,
            'score' => $score,
        ]);

        session()->forget(['attempt_id', 'selected_exam_id']);

        return response()->json([
            'status' => 'ok',
            'score' => $score,
            'message' => '✅ Ujian selesai. Skor berhasil disimpan!',
        ]);
    }

    /**
     * 📋 Cek jawaban (opsional)
     */
    public function cekJawaban()
    {
        $user = Auth::user();
        $attemptId = session('attempt_id');

        if (!$attemptId) {
            return response()->json(['status' => 'error', 'message' => 'Attempt tidak ditemukan.']);
        }

        $answers = Answer::where('user_id', $user->id)
            ->where('attempt_number', $attemptId)
            ->get();

        return response()->json(['status' => 'ok', 'answers' => $answers]);
    }
}
