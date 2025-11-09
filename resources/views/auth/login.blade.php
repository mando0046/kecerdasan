<x-guest-layout>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">

            <!-- Judul Form -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Welcome Guest 👋</h1>
                <p class="text-gray-500 text-sm">Login to continue</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username"
                        class="block w-full mt-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                    <x-text-input id="password" type="password" name="password" required
                        autocomplete="current-password"
                        class="block w-full mt-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label for="remember_me" class="flex items-center space-x-2">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('#'))
                        <a href="{{ route('#') }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div>
                    <x-primary-button
                        class="w-full justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-lg transition ease-in-out duration-150">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Register link -->
            <div class="mt-6 text-center text-sm text-gray-600">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-800">
                    {{ __('Register') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
