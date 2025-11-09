<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Score;

class HasilController extends Controller
{
    /**
     * 📊 Tampilkan hasil ujian terakhir peserta
     */
    public function hasil()
    {
        $userId = Auth::id();

        // Ambil hasil ujian terakhir dari tabel scores
        $lastScore = Score::where('user_id', $userId)
            ->latest('id')
            ->first();

        // Jika belum ada hasil ujian
        if (!$lastScore) {
            return view('peserta.hasil', [
                'total_questions' => 0,
                'correct_answers' => 0,
                'wrong_answers'   => 0,
                'unanswered'      => 0,
                'score'           => 0,
            ]);
        }

        // Hitung nilai detail
        $total_questions = $lastScore->total_questions ?? 0;
        $correct_answers = $lastScore->correct_answers ?? 0;
        $wrong_answers   = max(0, $total_questions - $correct_answers);
        $unanswered      = 0; // diasumsikan sudah dihitung sebelumnya
        $score           = $lastScore->score ?? 0;

        return view('peserta.hasil', compact(
            'total_questions',
            'correct_answers',
            'wrong_answers',
            'unanswered',
            'score'
        ));
    }

    /**
     * 🖨️ Cetak hasil ujian ke PDF
     */
    public function cetakPdf()
    {
        $user = Auth::user();

        // Ambil seluruh riwayat ujian user
        $examAttempts = Score::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        if ($examAttempts->isEmpty()) {
            return redirect()->route('peserta.hasil')
                ->with('error', 'Belum ada hasil ujian untuk dicetak.');
        }

        // Generate PDF dari view
        $pdf = Pdf::loadView('peserta.hasil-pdf', [
            'user' => $user,
            'examAttempts' => $examAttempts,
        ])->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'Hasil_Ujian_' . str_replace(' ', '_', $user->name) . '.pdf'
        );
    }

    /**
     * 🔁 Setelah cetak selesai, arahkan ke dashboard
     */
    public function cetakSelesai()
    {
        return redirect()->route('peserta.dashboard')
            ->with('success', 'Hasil ujian berhasil dicetak.');
    }
}
