<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;
use App\Models\ExamResetRequest;
use App\Models\Question;
use App\Models\Score;
use App\Models\Exam;

class DashboardController extends Controller
{
    /**
     * 🔹 Tampilkan halaman dashboard peserta.
     */
    public function index()
    {
        $userId = Auth::id();

        // Cek apakah peserta sudah pernah mengerjakan ujian
        $hasTakenExam = Answer::where('user_id', $userId)->exists();

        // Hitung jumlah percobaan ujian dari tabel Score
        $examAttempts = Score::where('user_id', $userId)->count();

        // Batas maksimum percobaan ujian
        $maxAttempts = 5;

        // Apakah user sudah mencapai batas maksimum?
        $hasReachedLimit = $examAttempts >= $maxAttempts;

        // Cek apakah peserta memiliki permintaan reset yang sudah disetujui admin
        $resetApproved = ExamResetRequest::where('user_id', $userId)
                            ->where('status', 'approved')
                            ->exists();

        // Ambil daftar soal hanya jika belum ujian atau reset disetujui
        $questions = [];
        if (!$hasTakenExam || $resetApproved) {
            $questions = Question::all();
        }

        // Ambil exam aktif (misalnya kolom is_active = true)
        $exam = Exam::where('is_active', true)->first();

        // Durasi ujian (ambil dari exam jika ada)
        $duration = $exam->duration ?? 60;

        return view('peserta.dashboard', compact(
            'hasTakenExam',
            'examAttempts',
            'maxAttempts',
            'hasReachedLimit',
            'resetApproved',
            'questions',
            'duration',
            'exam' // ✅ kirim ke view agar bisa ditampilkan di blade
        ));
    }

    /**
     * 🔹 Kirim permintaan reset ujian oleh peserta.
     */
    public function requestReset(Request $request)
    {
        $user = Auth::user();

        // Simpan alasan pengajuan reset ke database (misalnya di kolom users.reset_reason)
        $user->update([
            'reset_requested' => true,
            'reset_reason' => $request->input('reason', 'Tidak ada alasan'),
        ]);

        return back()->with('success', 'Permintaan reset ujian telah dikirim ke admin.');
    }
}
