<x-guest-layout>
    <div
        class="relative min-h-screen flex items-center justify-center
               bg-gradient-to-br from-sky-200 via-blue-200 to-indigo-200 px-4 overflow-hidden">

        <!-- Glass overlay -->
        <div class="absolute inset-0 bg-white/30 backdrop-blur-xl"></div>

        <!-- Card -->
        <div
            class="relative w-full max-w-md rounded-2xl shadow-2xl p-8
                   bg-gradient-to-br from-purple-700 via-purple-800 to-indigo-900
                   text-white">

            <!-- Title -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-extrabold">Welcome Guest 👋</h1>
                <p class="text-purple-200 text-sm mt-1">Login to continue</p>
            </div>

            <x-auth-session-status class="mb-4 text-purple-100" :status="session('status')" />

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" value="Email" class="text-purple-200 font-medium" />

                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        placeholder="you@example.com"
                        class="block w-full mt-1 rounded-lg
                               bg-white text-gray-800
                               border border-purple-300
                               placeholder-gray-400
                               focus:border-purple-500 focus:ring-purple-500" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" value="Password" class="text-purple-200 font-medium" />

                    <div class="relative">
                        <x-text-input id="password" type="password" name="password" required placeholder="••••••••"
                            class="block w-full mt-1 rounded-lg
                                   bg-white text-gray-800
                                   border border-purple-300
                                   placeholder-gray-400
                                   focus:border-purple-500 focus:ring-purple-500 pr-12" />

                        <!-- Toggle Button -->
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-3 flex items-center
                                   text-purple-600 hover:text-purple-800 text-sm font-medium">
                            👁
                        </button>
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-purple-200">
                        <input type="checkbox" class="rounded border-purple-400 bg-purple-800 text-purple-300">
                        Remember me
                    </label>

                    <a href="{{ route('password.request') }}" class="text-purple-300 hover:text-white">
                        Forgot Password?
                    </a>
                </div>

                <!-- Button -->
                <x-primary-button
                    class="w-full justify-center py-3 rounded-xl
           bg-white/20 backdrop-blur-md
           border border-white/30
           text-red-500 font-extrabold tracking-widest
           shadow-lg
           drop-shadow-[0_0_20px_rgba(59,130,246,0.6)]

           transition-all duration-300
           hover:drop-shadow-[0_0_28px_rgba(59,130,246,0.85)]
           transform hover:-translate-y-0.5">
                    LOGIN
                </x-primary-button>





                <!-- Register -->
                <div class="mt-6 text-center text-sm text-purple-200">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-purple-300 hover:text-white">
                        Register
                    </a>
                </div>

                <!-- Footer -->
                <p class="mt-6 text-center text-xs text-purple-300">
                    © Company 2025 · mandoubuntu0046
                </p>
        </div>
    </div>

    <!-- Show / Hide Password Script -->
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
