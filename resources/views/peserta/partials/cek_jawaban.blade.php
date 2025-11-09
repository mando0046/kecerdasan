<!-- resources/views/peserta/partials/cek_jawaban.blade.php -->

<div class="max-w-4xl mx-auto p-4 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-4">📋 Ringkasan Jawaban</h2>

    <table class="w-full border-collapse text-sm">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">No</th>
                <th class="border px-2 py-1">Soal</th>
                <th class="border px-2 py-1">Jawaban Anda</th>
                <th class="border px-2 py-1">Jawaban Benar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $i => $a)
                <tr
                    class="{{ $a->answer == $a->question->correct_answer ? 'bg-green-100' : ($a->answer == '' ? 'bg-gray-100' : 'bg-red-100') }}">
                    <td class="border px-2 py-1">{{ $i + 1 }}</td>
                    <td class="border px-2 py-1">{!! $a->question->question_text !!}</td>
                    <td class="border px-2 py-1">{{ $a->answer ?: '-' }}</td>
                    <td class="border px-2 py-1">{{ $a->question->correct_answer }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 flex justify-end gap-2">
        <a href="{{ route('peserta.ujian.index') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition-all">
            🔙 Kembali ke Ujian
        </a>
        <a href="{{ route('peserta.ujian.cetakSemua') }}"
            class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition-all">
            🖨️ Cetak Hasil
        </a>
    </div>
</div>
