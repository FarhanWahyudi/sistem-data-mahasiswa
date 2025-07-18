<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="w-full">
        @csrf

        <h1 class="font-medium text-3xl mb-5 lg:text-4xl lg:mb-8">Sign in</h1>

        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-1 w-full" placeholder="Email address" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 focus:ring-0" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-primary-button class="mt-3">
            {{ __('Login') }}
        </x-primary-button>

        <p class="mt-3 text-center text-xs text-gray-600 sm:text-sm">Don't have an account? <a href="/register" class="text-blue-500 font-semibold">Sign up</a></p>
    </form>
</x-guest-layout>
