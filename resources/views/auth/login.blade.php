<x-guest-layout>
    <!-- Reseロゴ表示 -->
    <x-slot name="logo">
        <a href="/">
            <img src=" {{ asset('img/rese_login.jpg')}} " alt="Rese LOGO" class="sm:w-20vw sm:pl-14 sm:pt-5">
        </a>
    </x-slot>

    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="text-white font-bold">
            <p>Login</p>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mt-5" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-4 flex items-center">
                {{-- <x-label for="email" :value="__('Email')" /> --}}
               <i class="fas fa-envelope pl-4 pr-4 text-3xl"></i>
                <x-input id="email" class="block mt-1 w-full" type="email" placehplder="Email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4 flex items-center">
                {{-- <x-label for="password" :value="__('Password')" /> --}}
                <i class="fas fa-lock pl-4 pr-4 text-3xl"></i>
                <x-input id="password" class="block mt-1 w-full"
                                placeholder="Password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-4" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <a class="inline-flex items-center px-4 py-2 bg-rese border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('register') }}">
                        {{ __('registration') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
