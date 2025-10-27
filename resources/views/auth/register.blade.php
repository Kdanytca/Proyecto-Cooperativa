<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Ilustración (duende a la izquierda) -->
        <div class="flex w-1/2 bg-green-100 items-center justify-center">
            <img src="{{ asset('img/duende.png') }}" alt="Duende con dinero" class="w-3/4 max-w-md">
        </div>


        <!-- Formulario -->
        <div class="flex w-full md:w-1/2 bg-white items-center justify-center">
            <div class="w-full max-w-md p-8 space-y-6 rounded-2xl shadow-lg">
                <h2 class="text-3xl font-extrabold text-green-900 text-center">
                    Crear cuenta
                </h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nombre')" class="text-green-800 font-semibold" />
                        <x-text-input id="name"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Correo')" class="text-green-800 font-semibold" />
                        <x-text-input id="email"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña')" class="text-green-800 font-semibold" />
                        <x-text-input id="password"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')"
                            class="text-green-800 font-semibold" />
                        <x-text-input id="password_confirmation"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Tipo de Usuario -->
                    <div class="mt-4">
                        <x-input-label for="tipo_usuario" :value="__('Tipo de Usuario')" class="text-green-800 font-semibold" />
                        <x-text-input id="tipo_usuario"
                            class="block mt-1 w-full rounded-lg border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed"
                            type="text" name="tipo_usuario" value="Cliente" readonly />
                        <p class="text-xs text-gray-500 mt-1">Este valor es asignado automáticamente.</p>
                    </div>

                    <!-- Botón -->
                    <div class="flex items-center justify-between mt-6">
                        <a class="text-sm text-green-700 hover:text-green-900 underline" href="{{ route('login') }}">
                            ¿Ya tienes cuenta?
                        </a>
                        <x-primary-button class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">
                            {{ __('Registrarse') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
