<x-guest-layout>
    <!-- Reseロゴ表示 -->
    <x-slot name="logo">
        <a href="/">
            <img src=" {{ asset('img/rese_login.jpg')}} " alt="Rese LOGO" class="sm:w-20vw sm:pl-14 sm:pt-5">
        </a>
    </x-slot>

    <x-auth-card>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="text-white font-bold">
                <p>Registration</p>
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mt-5" :errors="$errors" />

            <!-- Name -->
            <div class="mt-5 flex items-center">
                {{-- <x-label for="name" :value="__('Name')" /> --}}
                <i class="fas fa-user-alt pl-4 pr-4 text-3xl"></i>
                <x-input id="name" class="block mt-1 w-full" placeholder="Username" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4 flex items-center">
                {{-- <x-label for="email" :value="__('Email')" /> --}}
                <i class="fas fa-envelope pl-4 pr-4 text-3xl"></i>
                <x-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4 flex items-center">
                {{-- <x-label for="password" :value="__('Password')" /> --}}
                <i class="fas fa-lock pl-4 pr-4 text-3xl"></i>
                <x-input id="password" class="block mt-1 w-full"
                                placeholder="Password"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 flex items-center">
                {{-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}
                <i class="fas fa-check-double pl-4 pr-4 text-3xl"></i>
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                placeholder="Confirm Password"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
