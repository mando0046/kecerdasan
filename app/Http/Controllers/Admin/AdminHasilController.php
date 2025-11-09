<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Score;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminHasilController extends Controller
{
    /**
     * 🔹 Tampilkan hasil ujian semua peserta.
     */
    public function index()
    {
        $scoresCount = Score::count();

        if ($scoresCount > 0) {
            // Gunakan data dari tabel scores
            $hasilPeserta = Score::with(['user', 'exam'])
                ->select('id', 'user_id', 'exam_id', 'attempt_number', 'correct_answers', 'total_questions', 'score', 'created_at')
                ->get()
                ->map(function ($item) {
                    return [
                        'id'          => $item->id,
                        'nama'        => $item->user->name ?? '-',
                        'jenis_ujian' => $item->exam->name ?? '-',
                        'benar'       => $item->correct_answers ?? 0,
                        'total'       => $item->total_questions ?? 0,
                        'salah'       => max(0, ($item->total_questions ?? 0) - ($item->correct_answers ?? 0)),
                        'nilai'       => $item->score ?? 0,
                        'created_at'  => $item->created_at,
                    ];
                });
        } else {
            // Hitung langsung dari tabel answers
            $pesertas = User::where('role', 'peserta')->get();

            $hasilPeserta = $pesertas->map(function ($peserta) {
                $answers = Answer::with(['question.exam'])
                    ->where('user_id', $peserta->id)
                    ->get();

                $total = $answers->count();
                $benar = $answers->filter(function ($ans) {
                    return isset($ans->question)
                        && strtolower(trim($ans->jawaban)) === strtolower(trim($ans->question->answer));
                })->count();

                $salah = $total - $benar;
                $nilai = $total > 0 ? round(($benar / $total) * 100, 2) : 0;

                // Ambil jenis ujian dari pertanyaan pertama, jika ada
                $jenisUjian = $answers->first()?->question?->exam?->name ?? '-';

                return [
                    'id'          => $peserta->id,
                    'nama'        => $peserta->name,
                    'jenis_ujian' => $jenisUjian,
                    'total'       => $total,
                    'benar'       => $benar,
                    'salah'       => $salah,
                    'nilai'       => $nilai,
                    'created_at'  => $answers->max('created_at'),
                ];
            });
        }

        return view('admin.hasil', compact('hasilPeserta'));
    }

    /**
     * 🔹 Export hasil ke PDF.
     */
    public function hasilPdf()
    {
        $scoresCount = Score::count();

        if ($scoresCount > 0) {
            $hasilPeserta = Score::with(['user', 'exam'])
                ->select('id', 'user_id', 'exam_id', 'attempt_number', 'correct_answers', 'total_questions', 'score', 'created_at')
                ->get()
                ->map(function ($item) {
                    return [
                        'id'          => $item->id,
                        'nama'        => $item->user->name ?? '-',
                        'jenis_ujian' => $item->exam->name ?? '-',
                        'benar'       => $item->correct_answers ?? 0,
                        'total'       => $item->total_questions ?? 0,
                        'salah'       => max(0, ($item->total_questions ?? 0) - ($item->correct_answers ?? 0)),
                        'nilai'       => $item->score ?? 0,
                        'created_at'  => $item->created_at,
                    ];
                });
        } else {
            $pesertas = User::where('role', 'peserta')->get();

            $hasilPeserta = $pesertas->map(function ($peserta) {
                $answers = Answer::with(['question.exam'])
                    ->where('user_id', $peserta->id)
                    ->get();

                $total = $answers->count();
                $benar = $answers->filter(function ($ans) {
                    return isset($ans->question)
                        && strtolower(trim($ans->jawaban)) === strtolower(trim($ans->question->answer));
                })->count();

                $salah = $total - $benar;
                $nilai = $total > 0 ? round(($benar / $total) * 100, 2) : 0;

                $jenisUjian = $answers->first()?->question?->exam?->name ?? '-';

                return [
                    'id'          => $peserta->id,
                    'nama'        => $peserta->name,
                    'jenis_ujian' => $jenisUjian,
                    'total'       => $total,
                    'benar'       => $benar,
                    'salah'       => $salah,
                    'nilai'       => $nilai,
                    'created_at'  => $answers->max('created_at'),
                ];
            });
        }

        $pdf = Pdf::loadView('admin.hasil-pdf', compact('hasilPeserta'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('hasil_ujian_semua_peserta.pdf');
    }

    /**
     * 🔹 Hapus semua hasil ujian.
     */
    public function resetHasil()
    {
        DB::table('scores')->truncate();
        DB::table('answers')->truncate();

        if (Schema::hasTable('exam_attempts')) {
            DB::table('exam_attempts')->truncate();
        }

        return redirect()
            ->route('admin.hasil.index')
            ->with('success', '✅ Semua hasil ujian berhasil direset.');
    }

    /**
     * 🔹 Hapus hasil ujian satu peserta berdasarkan ID di tabel scores.
     */
    public function destroy($id)
    {
        $score = Score::find($id);

        if (!$score) {
            return redirect()
                ->route('admin.hasil.index')
                ->with('error', '❌ Data hasil ujian tidak ditemukan.');
        }

        // Hapus juga jawaban peserta terkait
        Answer::where('user_id', $score->user_id)->delete();
        $score->delete();

        return redirect()
            ->route('admin.hasil.index')
            ->with('success', '✅ Hasil ujian peserta berhasil dihapus.');
    }
}
