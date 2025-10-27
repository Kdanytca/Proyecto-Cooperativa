@extends('layouts.app')

@section('title', 'Gestión de Clientes')

@section('content')
    <div class="max-w-7xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">👥 Gestión de Clientes</h1>

        <a href="{{ route('administrador.clients.create') }}"
            class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600 transition">
            + Nuevo Cliente
        </a>

        <table class="w-full mt-6 border-collapse text-center">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">ID</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Perfil Crediticio</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($clients as $client)
                    <tr class="border-t">
                        <td class="p-2">{{ $client->id }}</td>
                        <td class="p-2">{{ $client->name }}</td>
                        <td class="p-2">{{ $client->email }}</td>

                        {{-- 🔹 Mostrar datos del perfil crediticio si existe --}}
                        <td class="p-2">
                            @if ($client->perfilCrediticio)
                                <div class="text-sm text-gray-700 space-y-1">
                                    <p><strong>Activos:</strong> {{ $client->perfilCrediticio->creditos_activos }}</p>
                                    <p><strong>Pagados:</strong> {{ $client->perfilCrediticio->creditos_pagados }}</p>
                                    <p><strong>Score:</strong> {{ $client->perfilCrediticio->calificacion }}%</p>
                                </div>
                            @else
                                <span class="text-gray-400 italic">Sin historial</span>
                            @endif
                        </td>

                        {{-- 🔹 Acciones --}}
                        <td class="p-2 flex gap-2 justify-center">
                            <a href="{{ route('administrador.clients.edit', $client) }}"
                                class="px-3 py-1 border border-blue-500 text-blue-600 rounded hover:bg-blue-50">
                                Editar
                            </a>

                            @if (auth()->user()->tipo_usuario === 'administrador')
                                <form action="{{ route('administrador.clients.destroy', $client) }}" method="POST"
                                    onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 border border-red-500 text-red-600 rounded hover:bg-red-50">
                                        Eliminar
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-gray-500">No hay clientes registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
