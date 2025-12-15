<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Desactiva validación nativa del navegador --}}
    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        {{-- Correo --}}
        <div>
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Contraseña --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Recordarme --}}
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm
                           focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember"
                >
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Recordarme') }}
                </span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100
                           rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                           dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}"
                >
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <a href="{{ route('register') }}"
           class="text-sm text-gray-500 underline hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100">
            ¿No tienes cuenta? Regístrate aquí
        </a>
    </div>
</x-guest-layout>
