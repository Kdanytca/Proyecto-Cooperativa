{{-- resources/views/administrador/creditos/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-6">

        {{-- Mensajes del sistema --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="bg-yellow-100 text-yellow-800 p-3 rounded mb-4 border border-yellow-300">
                {{ session('warning') }}
            </div>
        @endif

        <h2 class="text-2xl font-bold text-green-900 mb-6">
            Detalle del Crédito #{{ $credito->id }}
        </h2>

        {{-- Datos del cliente --}}
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Datos del Cliente</h3>
            <p><strong>Cliente:</strong> {{ $credito->user->name }}</p>
            <p><strong>Email:</strong> {{ $credito->user->email }}</p>
        </div>

        {{-- Datos del crédito --}}
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Información del Crédito</h3>
            <p><strong>Plan:</strong> {{ $credito->plan }}</p>
            <p><strong>Monto:</strong> ${{ number_format($credito->monto, 2) }}</p>
            <p><strong>Plazo:</strong> {{ $credito->plazo_meses }} meses</p>
            <p><strong>Interés:</strong> {{ $credito->interes }}%</p>
            <p><strong>Estado:</strong>
                @if ($credito->estado === 'pendiente')
                    <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-xs">Pendiente</span>
                @elseif($credito->estado === 'aprobado')
                    <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs">Aprobado</span>
                @elseif($credito->estado === 'rechazado')
                    <span class="bg-red-200 text-red-800 px-2 py-1 rounded-full text-xs">Rechazado</span>
                @elseif($credito->estado === 'liquidado')
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">Liquidado</span>
                @endif
            </p>
            <p><strong>Fecha de creación:</strong> {{ $credito->created_at->format('d/m/Y') }}</p>
        </div>

        {{-- Acciones para aprobar/rechazar --}}
        @php
            $perfil = $credito->user->perfilCrediticio ?? null;
            $datosCompletos = $perfil && $perfil->salario && $perfil->telefono;
        @endphp

        @if ($credito->estado === 'pendiente')
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Acciones del Administrador</h3>

                @if (!$datosCompletos)
                    {{-- Si no tiene datos crediticios completos --}}
                    <a href="{{ route('administrador.perfil-crediticio.edit', $credito->user->id) }}"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 text-sm">
                        Completar datos crediticios
                    </a>
                @else
                    {{-- Botones de aprobar/rechazar --}}
                    <form action="{{ route('administrador.creditos.update', $credito->id) }}" method="POST"
                        class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="estado" value="aprobado">
                        <button type="submit"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm">
                            Aprobar crédito
                        </button>
                    </form>

                    <form action="{{ route('administrador.creditos.update', $credito->id) }}" method="POST"
                        class="inline ml-2">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="estado" value="rechazado">
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm">
                            Rechazar crédito
                        </button>
                    </form>
                @endif
            </div>
        @endif

        {{-- Cuotas --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Cuotas</h3>

            @if ($credito->cuotas->isEmpty())
                <p class="text-gray-500">Este crédito no tiene cuotas generadas aún.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                        <thead>
                            <tr class="bg-green-600 text-white">
                                <th class="px-4 py-2 text-left">#</th>
                                <th class="px-4 py-2 text-left">Monto</th>
                                <th class="px-4 py-2 text-left">Fecha de vencimiento</th>
                                <th class="px-4 py-2 text-left">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($credito->cuotas as $cuota)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $cuota->numero_cuota }}</td>
                                    <td class="px-4 py-2">${{ number_format($cuota->monto, 2) }}</td>
                                    <td class="px-4 py-2">
                                        {{ \Carbon\Carbon::parse($cuota->fecha_vencimiento)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-2">
                                        @if ($cuota->estado === 'pendiente')
                                            <span
                                                class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-xs">Pendiente</span>
                                        @elseif($cuota->estado === 'pagada')
                                            <span
                                                class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs">Pagada</span>
                                        @else
                                            <span
                                                class="bg-red-200 text-red-800 px-2 py-1 rounded-full text-xs">Vencida</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('administrador.creditos.index') }}" class="text-green-700 hover:underline">
                ← Volver al listado
            </a>
        </div>
    </div>
@endsection
