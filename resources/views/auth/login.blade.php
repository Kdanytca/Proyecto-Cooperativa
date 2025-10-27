<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-green-100">
        <div class="max-w-5xl w-full bg-white rounded-3xl shadow-2xl grid md:grid-cols-2 overflow-hidden">

            <!-- Columna izquierda (imagen/ilustración) -->
            <div class="hidden md:flex items-center justify-center bg-green-200 p-10">
                <!-- Aquí podrías poner un SVG o imagen -->
                <img src="{{ asset('img/duende.png') }}" alt="Duende con dinero"
                    class="w-80 h-80 object-contain">
            </div>

            <!-- Columna derecha (formulario) -->
            <div class="p-10 flex flex-col justify-center">
                <h2 class="text-4xl font-extrabold text-green-900 text-center mb-8">
                    Bienvenido de nuevo
                </h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Correo electrónico')" class="text-green-800 font-semibold" />
                        <x-text-input id="email"
                            class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500"
                            type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" class="text-green-800 font-semibold" />
                        <x-text-input id="password"
                            class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500"
                            type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                            name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-gray-700">
                            Recordarme
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-green-700 hover:text-green-900"
                                href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif

                        <button type="submit"
                            class="bg-yellow-400 text-green-900 hover:bg-yellow-300 font-semibold px-6 py-3 rounded-xl shadow-md transition">
                            Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
