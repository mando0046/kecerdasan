<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎓 Dashboard Peserta
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white p-6 mt-6 rounded-2xl shadow-lg space-y-6">
        {{-- === HEADER === --}}
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Selamat datang, {{ Auth::user()->name }}
            </h2>
            <p class="text-gray-500 mt-1">
                Kamu dapat memulai ujian, melihat hasil, mencetak hasil, atau mengajukan reset di sini.
            </p>

            <a href="{{ route('peserta.profil.index') }}"
                class="inline-block mt-3 px-4 py-2 bg-green-200 rounded-lg text-sm font-semibold text-gray-700 transition hover:bg-yellow-400 hover:text-black hover:font-bold">
                ⚙️ Edit Profil
            </a>
        </div>

        {{-- === NOTIFIKASI === --}}
        @if (session('success'))
            <div id="alert-success"
                class="p-3 bg-green-100 text-green-700 rounded-lg border border-green-300 text-center">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="alert-error" class="p-3 bg-red-100 text-red-700 rounded-lg border border-red-300 text-center">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        {{-- === MENU AKSI === --}}
        <div class="mt-4 flex flex-wrap gap-3 items-center justify-center">
            @if ($hasTakenExam && !$resetApproved && !$hasReachedLimit)
                <a href="{{ route('peserta.hasil.index') }}"
                    class="px-6 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-500 transition">
                    📊 Lihat Hasil Ujian
                </a>

                <a href="{{ route('peserta.hasil.cetak') }}" target="_blank"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-500 transition">
                    🖨️ Cetak Hasil Ujian
                </a>

                {{-- Tombol mulai ujian baru --}}
                <a href="{{ route('peserta.ujian.pilih') }}"
                    class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-500 transition">
                    🚀 Ikut Ujian Sekarang
                </a>
            @elseif ($hasReachedLimit && !$resetApproved)
                <div
                    class="px-6 py-3 bg-red-100 text-red-700 rounded-lg font-extrabold text-2xl border-2 border-red-500 text-center animate-pulse shadow-md">
                    ❌ Batas Ujian Tercapai
                </div>

                <form action="{{ route('peserta.ujian-ulang.form') }}" method="POST" class="inline-block">
                    @csrf
                    <input type="hidden" name="reason" value="Ingin mengajukan ujian ulang.">
                    <button type="submit"
                        class="px-6 py-3 bg-orange-600 text-white rounded-lg font-semibold hover:bg-orange-500 transition">
                        🔁 Ajukan Ujian Ulang
                    </button>
                </form>
            @else
                <a href="{{ route('peserta.ujian.pilih') }}"
                    class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-500 transition">
                    🚀 Ikut Ujian Sekarang
                </a>
            @endif
        </div>

        {{-- === INFORMASI STATUS === --}}
        <div class="text-gray-700 text-center mt-4 leading-relaxed">
            @if ($hasReachedLimit && !$resetApproved)
                ❌ Kamu sudah mengikuti ujian sebanyak <b>{{ $examAttempts }}</b> kali,
                dan telah mencapai batas maksimal <b>{{ $maxAttempts }}</b> kali.
            @elseif ($hasTakenExam && !$resetApproved)
                Anda telah menyelesaikan ujian. Klik <b>"Lihat Hasil Ujian"</b> atau <b>"Cetak Hasil Ujian"</b> untuk
                melihat hasil Anda.
            @elseif ($resetApproved)
                ✅ Reset ujian kamu telah disetujui. Kamu dapat mengikuti ujian kembali.
            @else
                Klik tombol <b>"Ikut Ujian Sekarang"</b> untuk memulai mengerjakan soal. <br>
                <span class="text-sm text-gray-500">(Durasi ujian: {{ $duration }} menit)</span>
            @endif
        </div>

        <div id="examContainer" class="mt-6 hidden">
            @include('peserta.partials.ujian')
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Auto-hide alert
            setTimeout(() => {
                document.getElementById('alert-success')?.remove();
                document.getElementById('alert-error')?.remove();
            }, 4000);
        });
    </script>
</x-app-layout>
