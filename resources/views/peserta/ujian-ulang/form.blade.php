<x-app-layout>
    <x-slot name="header">
        🔁 Ajukan Ujian Ulang
    </x-slot>

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <form method="POST" action="{{ route('peserta.ujianUlang.store') }}">
            @csrf

            <div class="mb-4">
                <label for="reason" class="block font-semibold mb-2">Alasan Pengajuan</label>
                <textarea name="reason" id="reason" rows="4" class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
                    placeholder="Tuliskan alasan mengapa ingin ujian ulang..."></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-500 transition">
                    🚀 Kirim Permintaan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
