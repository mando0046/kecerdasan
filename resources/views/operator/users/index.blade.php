<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Guest & Peserta') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 text-green-600 font-semibold">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-4 text-red-600 font-semibold">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="w-full border border-gray-300 rounded-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">Nama</th>
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Role</th>
                            <th class="p-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b">
                                <td class="p-2 border">{{ $user->name }}</td>
                                <td class="p-2 border">{{ $user->email }}</td>
                                <td class="p-2 border text-center capitalize">{{ $user->role }}</td>
                                <td class="p-2 border text-center">
                                    @if ($user->role == 'guest')
                                        <form action="{{ route('operator.users.upgrade', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-primary-button>
                                                Ubah jadi Peserta
                                            </x-primary-button>
                                        </form>
                                    @else
                                        <span class="text-gray-500 text-sm">Tidak bisa diubah</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
