<x-app-layout>
    <div class="max-w-lg mx-auto bg-white p-6 mt-10 rounded-xl shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-center">🧠 Pilih Jenis Ujian</h2>

        @if ($exams->count())
            <form action="{{ route('peserta.ujian.mulaiBaru') }}" method="POST" class="space-y-4">
                @csrf

                <div class="space-y-3">
                    @foreach ($exams as $exam)
                        <label
                            class="block border border-gray-200 p-3 rounded-lg hover:bg-gray-100 cursor-pointer transition">
                            <input type="radio" name="exam_id" value="{{ $exam->id }}" required
                                class="mr-2 accent-blue-600">
                            <strong>{{ $exam->name }}</strong>
                            <p class="text-sm text-gray-500">
                                Durasi: {{ $exam->duration }} menit • {{ $exam->total_questions }} soal
                            </p>
                        </label>
                    @endforeach
                </div>

                <div class="flex justify-between gap-3 mt-6">
                    <a href="{{ route('peserta.dashboard') }}"
                        class="w-1/2 inline-flex items-center justify-center px-4 py-2 bg-green-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition">
                        ⬅️ Kembali
                    </a>

                    <x-primary-button class="w-1/2 justify-center">
                        Mulai Ujian
                    </x-primary-button>
                </div>
            </form>
        @else
            <div class="text-center text-gray-600">
                ⚠️ Belum ada ujian aktif.
            </div>
        @endif
    </div>
</x-app-layout>
