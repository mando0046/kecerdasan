<!-- resources/views/operator/profil.blade.php -->
<x-app-layout>
    <div class="max-w-3xl mx-auto py-12">

        {{-- 🔔 Toast Notification --}}
        @if (session('success'))
            <div id="toast-message"
                class="fixed top-6 right-6 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-500 opacity-0 translate-y-[-20px] z-50">
                {{ session('success') }}
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const toast = document.getElementById('toast-message');
                    if (toast) {
                        // tampilkan toast
                        toast.classList.remove('opacity-0', 'translate-y-[-20px]');
                        toast.classList.add('opacity-100', 'translate-y-0');

                        // hilangkan setelah 5 detik
                        setTimeout(() => {
                            toast.classList.add('opacity-0', 'translate-y-[-20px]');
                            setTimeout(() => toast.remove(), 500); // hapus elemen setelah animasi
                        }, 5000);
                    }
                });
            </script>
        @endif

        <h1 class="text-3xl font-bold text-green-700 mb-6">Profil Operator</h1>

        <form action="{{ route('operator.profil.update') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow space-y-6">
            @csrf
            @method('PATCH')

            <!-- Nama -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password Baru <span
                        class="text-sm text-gray-500">(Opsional)</span></label>
                <input type="password" name="password" id="password"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition-all duration-300">
                    Perbarui Profil
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
