<!-- resources/views/peserta/profil.blade.php -->
<x-app-layout>
    <!-- Header -->
    <x-slot name="header">

    </x-slot>

    <div class="max-w-3xl mx-auto bg-white p-12 mt-0 rounded-2xl shadow-lg">

        <!-- Flash Message -->
        @if (session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded-lg mb-4 border border-green-300">
                ✅ {{ session('success') }}
            </div>
        @endif
        <h1 class="text-3xl font-bold text-green-700 mb-6">Profil Peserta</h1>

        <!-- Form Update Profil -->
        <form action="{{ route('peserta.profil.update') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Nama Lengkap -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <hr class="my-4">

            <!-- Password Baru -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Password Baru (Opsional)</label>
                <input type="password" name="password"
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200"
                    placeholder="Masukkan password baru (kosongkan jika tidak ingin ubah)">
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation"
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200"
                    placeholder="Ulangi password baru">
            </div>

            <!-- Submit -->
            <div class="text-right mt-4">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 font-semibold transition">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>

        <!-- Kembali ke Dashboard -->
        <div class="text-center mt-6">
            <a href="{{ route('peserta.dashboard') }}"
                class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-400 transition">
                ⬅️ Kembali ke Dashboard
            </a>
        </div>

    </div>
</x-app-layout>
