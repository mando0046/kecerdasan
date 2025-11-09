<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
            📘 {{ __('Manajemen Soal') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ✅ Alert Sukses --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg shadow-sm relative"
                    role="alert">
                    <strong class="font-bold">✅ Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700"
                        onclick="this.parentElement.remove()">✖</button>
                </div>
            @endif

            {{-- ❌ Alert Error --}}
            @if (session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded-lg shadow-sm relative"
                    role="alert">
                    <strong class="font-bold">❌ Gagal!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-700"
                        onclick="this.parentElement.remove()">✖</button>
                </div>
            @endif

            {{-- 🔧 Tombol Aksi --}}
            <div class="flex flex-wrap items-center gap-3 mb-5">
                <a href="{{ route('operator.soal.create') }}"
                    class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg shadow">
                    ➕ Tambah Soal
                </a>


            </div>

            <!-- Tabel Soal -->
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-2 py-2 border text-center w-12">No</th>
                            <th class="px-3 py-2 border">Pertanyaan</th>
                            <th class="px-2 py-2 border text-center w-24">Kunci Jawaban</th>
                            <th class="px-2 py-2 border text-center w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $q)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-2 py-2 text-center">{{ $loop->iteration }}</td>
                                <td class="px-3 py-2">{{ $q->question }}</td>
                                <td class="px-2 py-2 text-center font-semibold text-green-600">
                                    {{ strtoupper($q->answer) }}
                                </td>
                                <td class="px-2 py-2 text-center">
                                    <a href="{{ route('operator.soal.edit', $q->id) }}"
                                        class="bg-blue-600 hover:bg-blue-500 text-white px-2 py-1 rounded-lg shadow text-sm">
                                        ✏️ Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 py-4">
                                    ❗ Belum ada soal yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            {{-- 🔙 Kembali ke Dashboard --}}
            <div class="mt-6 text-center">
                <a href="{{ url('/operator/dashboard') }}"
                    class="inline-block bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded-lg shadow">
                    ⬅️ Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

    {{-- ⏱️ Auto-hide alert --}}
    <script>
        setTimeout(() => {
            document.querySelectorAll('[role="alert"]').forEach(el => el.remove());
        }, 5000);
    </script>
</x-app-layout>
