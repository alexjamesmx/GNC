<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-10 w-10 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" class="mb-4" />

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label :value="__('Correo')" for="email" />
                <x-text-input :value="old('email')" autofocus class="mt-1 block w-full" id="email" name="email" required
                    type="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label :value="__('Contraseña')" for="password" />

                <x-text-input autocomplete="current-password" class="mt-1 block w-full" id="password" name="password"
                    required type="password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mt-4 block">
                <label class="inline-flex items-center" for="remember_me">
                    <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        id="remember_me" name="remember" type="checkbox">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                @if (Route::has('password.request'))
                    <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Ingresar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
