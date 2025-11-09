<x-app-layout>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-indigo-200 to-purple-200 py-10 px-4">
        <div class="w-full max-w-3xl bg-white rounded-2xl shadow-2xl p-8 text-center">

            <!-- Judul -->
            <h2 class="text-3xl font-bold mb-6 text-gray-800">🎓 Hasil Ujian Kamu</h2>

            <!-- Identitas -->
            <div class="mb-8">
                <p class="text-lg text-gray-700">
                    Peserta: <span class="font-semibold">{{ Auth::user()->name }}</span>
                </p>
                <p class="text-gray-600">Tanggal: {{ now()->format('d M Y, H:i') }}</p>
            </div>

            <!-- Statistik Ujian -->
            <div class="space-y-4 text-lg">
                <div class="flex justify-between text-gray-700">
                    <span>Total Soal:</span>
                    <span class="font-semibold">
                        {{ $exam->total_questions ?? ($total_questions ?? 0) }}
                    </span>
                </div>
                <div class="flex justify-between text-green-600">
                    <span>Jawaban Benar:</span>
                    <span class="font-semibold">{{ $correct_answers ?? 0 }}</span>
                </div>
                <div class="flex justify-between text-red-600">
                    <span>Jawaban Salah:</span>
                    <span class="font-semibold">{{ $wrong_answers ?? 0 }}</span>
                </div>
            </div>

            <!-- Nilai Akhir -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Nilai Akhir</h3>

                <div class="w-full bg-gray-200 rounded-full h-6 overflow-hidden shadow-inner">
                    <div id="progress-bar"
                        class="h-6 rounded-full transition-all duration-1000 ease-out
                        @if (($score ?? 0) >= 81) bg-green-500
                        @elseif(($score ?? 0) >= 75) bg-lime-400
                        @elseif(($score ?? 0) >= 61) bg-yellow-400
                        @else bg-red-500 @endif"
                        style="width: 0%;">
                    </div>
                </div>

                <p
                    class="text-4xl font-extrabold mt-4
                    @if (($score ?? 0) >= 81) text-green-600
                    @elseif(($score ?? 0) >= 75) text-lime-600
                    @elseif(($score ?? 0) >= 61) text-yellow-600
                    @else text-red-600 @endif">
                    {{ $score ?? 0 }} / 100
                </p>

                <p class="mt-3 text-gray-700 italic text-lg">
                    @if (($score ?? 0) >= 81)
                        🎉 Hebat! Nilaimu <strong>Sangat Bagus!</strong>
                    @elseif(($score ?? 0) >= 75)
                        🌟 Nilaimu <strong>Bagus</strong>, tingkatkan lagi ya!
                    @elseif(($score ?? 0) >= 61)
                        👍 Nilaimu <strong>Cukup</strong>, terus berlatih!
                    @else
                        💪 Nilaimu <strong>Kurang</strong>. Jangan menyerah — kamu pasti bisa!
                    @endif
                </p>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('peserta.hasil.cetak') }}"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold shadow transition">
                    🖨️ Cetak ke PDF
                </a>

                <a href="{{ route('peserta.dashboard') }}"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold shadow transition">
                    ⬅️ Kembali ke Dashboard
                </a>
            </div>

            <!-- Riwayat Ujian -->
            @if (isset($examAttempts) && count($examAttempts) > 0)
                <div class="mt-12">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">📜 Riwayat Ujian Kamu</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-indigo-100 text-gray-700">
                                    <th class="p-2 border">#</th>
                                    <th class="p-2 border">Ujian</th>
                                    <th class="p-2 border text-center">Benar</th>
                                    <th class="p-2 border text-center">Total</th>
                                    <th class="p-2 border text-center">Nilai</th>
                                    <th class="p-2 border text-center">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($examAttempts as $hasil)
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-2 border text-center">{{ $loop->iteration }}</td>
                                        <td class="p-2 border">{{ $hasil->exam->name ?? 'Ujian Tidak Diketahui' }}</td>
                                        <td class="p-2 border text-center text-green-600">{{ $hasil->correct_answers }}
                                        </td>
                                        <td class="p-2 border text-center">{{ $hasil->total_questions }}</td>
                                        <td class="p-2 border text-center font-bold">{{ $hasil->score_percentage }}%
                                        </td>
                                        <td class="p-2 border text-center">
                                            {{ $hasil->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Script Animasi -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const score = {{ $score ?? 0 }};
            const progress = document.getElementById('progress-bar');
            const finalWidth = Math.min(score, 100) + '%';
            setTimeout(() => progress.style.width = finalWidth, 300);

            if (score >= 81) {
                const duration = 2500;
                const end = Date.now() + duration;
                const defaults = {
                    startVelocity: 25,
                    spread: 360,
                    ticks: 60,
                    zIndex: 9999
                };

                const interval = setInterval(() => {
                    const timeLeft = end - Date.now();
                    if (timeLeft <= 0) return clearInterval(interval);
                    const particleCount = 50 * (timeLeft / duration);
                    confetti({
                        ...defaults,
                        particleCount,
                        origin: {
                            x: Math.random(),
                            y: Math.random() - 0.2
                        }
                    });
                }, 200);
            }
        });
    </script>
</x-app-layout>
