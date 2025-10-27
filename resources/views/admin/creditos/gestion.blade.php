@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-green-900 mb-6">📊 Gestión de Créditos</h2>

        <!-- Créditos Aprobados -->
        <div class="mb-10 text-center">
            <h3 class="text-xl font-semibold text-green-800 mb-3">✅ Créditos Vigentes</h3>
            <div class="bg-white shadow rounded-xl overflow-hidden">
                <table class="min-w-full text-sm text-gray-700 text-center">
                    <thead class="bg-green-100">
                        <tr>
                            <th class="px-4 py-2">Cliente</th>
                            <th class="px-4 py-2">Plan</th>
                            <th class="px-4 py-2">Monto</th>
                            <th class="px-4 py-2">Plazo</th>
                            <th class="px-4 py-2">Fecha aprobación</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($aprobados as $credito)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $credito->user->name }}</td>
                                <td class="px-4 py-2">{{ ucfirst($credito->plan) }}</td>
                                <td class="px-4 py-2">${{ number_format($credito->monto, 2) }}</td>
                                <td class="px-4 py-2">{{ $credito->plazo_meses }} meses</td>
                                <td class="px-4 py-2">{{ $credito->updated_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('administrador.creditos.show', $credito) }}"
                                        class="text-blue-600 hover:underline">Ver detalle</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-3 text-center text-gray-500">
                                    No hay créditos aprobados
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Historial -->
        <div>
            <h3 class="text-xl font-semibold text-green-800 mb-3">📜 Historial de Créditos</h3>
            <div class="bg-white shadow rounded-xl overflow-hidden">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left">Cliente</th>
                            <th class="px-4 py-2 text-center">Plan</th>
                            <th class="px-4 py-2 text-center">Monto</th>
                            <th class="px-4 py-2 text-center">Estado</th>
                            <th class="px-4 py-2 text-center">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($historial as $credito)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $credito->user->name }}</td>
                                <td class="px-4 py-2 text-center">{{ ucfirst($credito->plan) }}</td>
                                <td class="px-4 py-2 text-center">${{ number_format($credito->monto, 2) }}</td>
                                <td class="px-4 py-2 text-center capitalize">{{ $credito->estado }}</td>
                                <td class="px-4 py-2 text-center">{{ $credito->updated_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500">No hay historial</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
