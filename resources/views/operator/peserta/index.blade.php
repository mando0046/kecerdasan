<x-app-layout>
    <x-slot name="header">
        👥 Manajemen Peserta & Guest
    </x-slot>

    <!-- ✅ Pesan sukses / error -->
    @if (session('success'))
        <div class="max-w-5xl mx-auto mt-4">
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded relative">
                ✅ {{ session('success') }}
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700"
                    onclick="this.parentElement.style.display='none';">✖</button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="max-w-5xl mx-auto mt-4">
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative">
                ❌ {{ session('error') }}
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-700"
                    onclick="this.parentElement.style.display='none';">✖</button>
            </div>
        </div>
    @endif

    <!-- 📋 Tabel User -->
    <div class="max-w-5xl mx-auto bg-white rounded shadow mt-6 overflow-x-auto">
        <table class="table-auto w-full border border-gray-200">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border text-center">Role</th>
                    <th class="px-4 py-2 border text-center w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-center">
                            <span
                                class="px-2 py-1 rounded text-sm font-medium
                                {{ $user->role === 'guest' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            @if ($user->role === 'guest')
                                <form action="{{ route('operator.peserta.ubahRole', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Ubah {{ $user->name }} menjadi peserta?')">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded shadow text-sm">
                                        🔄 Jadikan Peserta
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400 text-sm">✅ Sudah Peserta</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data peserta atau guest.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- 🔙 Kembali ke Dashboard -->
    <div class="mt-6 text-center">
        <a href="{{ route('operator.dashboard') }}"
            class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded shadow">
            ⬅️ Kembali ke Dashboard
        </a>
    </div>
</x-app-layout>
