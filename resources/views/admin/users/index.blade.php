@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
    <div class="max-w-7xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-green-900">👤 Gestión de Usuarios</h1>

        <!-- Botón crear -->
        <a href="{{ route('administrador.users.create') }}"
            class="bg-green-500 text-white px-4 py-2 rounded-lg font-semibold border border-green-600 hover:bg-green-600 transition">
            + Nuevo Usuario
        </a>

        <!-- Tabla -->
        <div class="overflow-x-auto mt-6">
            <table class="w-full border-collapse text-center shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-green-200 text-green-900">
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Nombre</th>
                        <th class="p-3 border">Email</th>
                        <th class="p-3 border">Rol</th>
                        <th class="p-3 border">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-green-50 divide-y divide-green-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-green-100 transition">
                            <td class="p-3 border">{{ $user->id }}</td>
                            <td class="p-3 border">{{ $user->name }}</td>
                            <td class="p-3 border">{{ $user->email }}</td>
                            <td class="p-3 border capitalize">{{ $user->tipo_usuario }}</td>
                            <td class="p-3 flex gap-2 justify-center">
                                {{-- BOTÓN EDITAR: Solo si NO (empleado intenta editar admin) --}}
                                @if (!(Auth::user()->tipo_usuario === 'empleado' && $user->tipo_usuario === 'administrador'))
                                    <a href="{{ route('administrador.users.edit', $user) }}"
                                        class="px-3 py-1 rounded-lg border border-blue-500 text-blue-700 bg-blue-100 hover:bg-blue-200 transition">
                                        ✏️ Editar
                                    </a>
                                @endif

                                {{-- BOTÓN ELIMINAR: Solo si NO es el mismo usuario Y NO (empleado intenta eliminar admin) --}}
                                @if (Auth::user()->id !== $user->id &&
                                        !(Auth::user()->tipo_usuario === 'empleado' && $user->tipo_usuario === 'administrador'))
                                    <form action="{{ route('administrador.users.destroy', $user) }}" method="POST"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded-lg border border-red-500 text-red-700 bg-red-100 hover:bg-red-200 transition">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
