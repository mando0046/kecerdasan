<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🧑‍💼 Dashboard Operator
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white p-6 mt-6 rounded-2xl shadow-lg space-y-6">
        {{-- === HEADER === --}}
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Selamat datang, {{ Auth::user()->name }}
            </h2>
            <p> <a href="{{ route('operator.profil.index') }}"
                    class="inline-block mt-3 px-4 py-2 bg-green-200 rounded-lg text-sm font-semibold text-gray-700 transition hover:bg-yellow-400 hover:text-black hover:font-bold">
                    ⚙️ Edit Profil
                </a></p>
            <p class="text-gray-500 mt-1">
                Anda dapat mengelola soal dan mengatur peserta di sini.
            </p>
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
        <div class="mt-4 flex flex-wrap gap-4 items-center justify-center">
            <a href="{{ route('operator.soal.index') }}"
                class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-500 transition">
                ✏️ Kelola Soal
            </a>

            <a href="{{ route('operator.peserta.index') }}"
                class="px-6 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-500 transition">
                👥 Kelola Guest & Peserta
            </a>
        </div>

        {{-- === INFORMASI TAMBAHAN === --}}
        <div class="text-center text-gray-600 mt-6 leading-relaxed">
            <p>
                Anda hanya memiliki akses untuk <b>membuat</b> dan <b>mengedit soal</b>,
                serta <b>mengubah role Guest menjadi Peserta</b>.
            </p>
            <p class="text-sm text-gray-500 mt-1">
                Fitur hapus dan reset soal dinonaktifkan untuk Operator.
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                document.getElementById('alert-success')?.remove();
                document.getElementById('alert-error')?.remove();
            }, 4000);
        });
    </script>
</x-app-layout>
