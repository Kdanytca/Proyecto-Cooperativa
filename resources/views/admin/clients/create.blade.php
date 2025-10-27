@extends('layouts.app')

@section('title', 'Crear Cliente')

@section('content')
    <div class="max-w-lg mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-green-900 text-center">🟢 Nuevo Cliente</h1>

        <form action="{{ route('administrador.clients.store') }}" method="POST"
            class="space-y-4 bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-green-800 font-semibold">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="block mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-green-800 font-semibold">Correo</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="block mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-green-800 font-semibold">Contraseña</label>
                <input type="password" name="password" id="password"
                    class="block mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar Password -->
            <div>
                <label for="password_confirmation" class="block text-green-800 font-semibold">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="block mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center">
                <a href="{{ route('administrador.clients.index') }}"
                    class="px-4 py-2 rounded-lg border border-gray-400 text-gray-700 hover:bg-gray-100 transition">
                    ⬅️ Volver
                </a>
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition">
                    Crear Cliente
                </button>
            </div>
        </form>
    </div>
@endsection
