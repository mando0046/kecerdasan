<x-guest-layout>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">

            <!-- Judul Form -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Create Account ✨</h1>
                <p class="text-gray-500 text-sm">Sign up to get started</p>
            </div>

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 font-semibold" />
                    <x-text-input id="name" name="name" type="text" :value="old('name')" required autofocus
                        autocomplete="name"
                        class="block w-full mt-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <x-text-input id="email" name="email" type="email" :value="old('email')" required
                        autocomplete="username"
                        class="block w-full mt-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                    <x-text-input id="password" name="password" type="password" required autocomplete="new-password"
                        class="block w-full mt-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-semibold" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" required
                        autocomplete="new-password"
                        class="block w-full mt-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Register Button -->
                <div>
                    <x-primary-button
                        class="w-full justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-lg transition ease-in-out duration-150">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Already registered -->
            <div class="mt-6 text-center text-sm text-gray-600">
                {{ __('Already registered?') }}
                <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-800">
                    {{ __('Login') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
