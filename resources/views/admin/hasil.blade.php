<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            📊 Hasil Ujian Semua Peserta
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h3 class="font-semibold mb-4 text-lg text-gray-700">
            Rekap Nilai Peserta
        </h3>

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full text-sm text-left border-collapse">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-3 py-2 border">No</th>
                        <th class="px-3 py-2 border">Nama Peserta</th>
                        <th class="px-3 py-2 border">Jenis Ujian</th>
                        <th class="px-3 py-2 border text-center">Benar</th>
                        <th class="px-3 py-2 border text-center">Salah</th>
                        <th class="px-3 py-2 border text-center">Total Soal</th>
                        <th class="px-3 py-2 border text-center">Nilai Akhir</th>
                        <th class="px-3 py-2 border text-center">Waktu Pengerjaan</th>
                        <th class="px-3 py-2 border text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($hasilPeserta as $index => $hasil)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-3 py-2 border text-center">{{ $index + 1 }}</td>
                            <td class="px-3 py-2 border whitespace-nowrap">{{ $hasil['nama'] ?? '-' }}</td>
                            <td class="px-3 py-2 border truncate max-w-[200px]">
                                {{ $hasil['jenis_ujian'] ?? ($hasil['exam_name'] ?? '-') }}
                            </td>
                            <td class="px-3 py-2 border text-center">{{ $hasil['benar'] ?? 0 }}</td>
                            <td class="px-3 py-2 border text-center">
                                {{ max(0, ($hasil['total'] ?? 0) - ($hasil['benar'] ?? 0)) }}
                            </td>
                            <td class="px-3 py-2 border text-center">{{ $hasil['total'] ?? 0 }}</td>
                            <td class="px-3 py-2 border text-center font-semibold text-blue-700">
                                {{ number_format($hasil['nilai'] ?? 0, 2, ',', '.') }}
                            </td>
                            <td class="px-3 py-2 border text-center text-gray-700">
                                @php
                                    $tanggal = '-';
                                    if (!empty($hasil['created_at'])) {
                                        try {
                                            $tanggal = \Carbon\Carbon::parse($hasil['created_at'])->format('d-m-Y H:i');
                                        } catch (\Exception $e) {
                                            $tanggal = '-';
                                        }
                                    }
                                @endphp
                                {{ $tanggal }}
                            </td>
                            <td class="px-3 py-2 border text-center">
                                <form action="{{ route('admin.hasil.destroy', $hasil['id']) }}" method="POST"
                                    onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus hasil ujian {{ $hasil['nama'] ?? 'peserta ini' }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1.5 rounded-md hover:bg-red-600 focus:ring-2 focus:ring-red-300 transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-3 py-4 border text-center text-gray-600">
                                Belum ada peserta yang mengikuti ujian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tombol Export dan Reset --}}
    <div class="mt-6 flex flex-wrap justify-center gap-4">
        <a href="{{ route('admin.hasil.pdf') }}"
            class="bg-green-600 text-white px-5 py-2 rounded-lg shadow hover:bg-green-700 focus:ring-2 focus:ring-green-300 transition">
            🧾 Export ke PDF
        </a>

        <form action="{{ route('admin.hasil.reset') }}" method="POST"
            onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus semua hasil ujian? Tindakan ini tidak dapat dibatalkan.')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-600 text-white px-5 py-2 rounded-lg shadow hover:bg-red-700 focus:ring-2 focus:ring-red-300 transition">
                🔄 Reset Hasil Ujian
            </button>
        </form>
    </div>

    {{-- Tombol Kembali ke Dashboard --}}
    <div class="mt-8 flex justify-center">
        <a href="{{ route('admin.dashboard') }}"
            class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 transition">
            ⬅️ Kembali ke Dashboard
        </a>
    </div>
</x-app-layout>
