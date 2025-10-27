@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-green-900 mb-4">📑 Mis Créditos</h2>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-green-100">
                <tr>
                    <th class="px-4 py-2 text-left">#</th>
                    <th class="px-4 py-2 text-left">Monto</th>
                    <th class="px-4 py-2 text-left">Plazo</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Fecha</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($creditos as $credito)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $credito->id }}</td>
                        <td class="px-4 py-2">${{ number_format($credito->monto, 2) }}</td>
                        <td class="px-4 py-2">{{ $credito->plazo_meses }} meses</td>
                        <td class="px-4 py-2">
                            @if ($credito->estado == 'pendiente')
                                <span class="px-2 py-1 rounded bg-yellow-200 text-yellow-800">Pendiente</span>
                            @elseif($credito->estado == 'aprobado')
                                <span class="px-2 py-1 rounded bg-green-200 text-green-800">Aprobado</span>
                            @elseif($credito->estado == 'liquidado')
                                <span class="px-2 py-1 rounded bg-gray-200 text-gray-800">Liquidado</span>
                            @elseif($credito->estado == 'rechazado')
                                <span class="px-2 py-1 rounded bg-red-200 text-red-800">Rechazado</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $credito->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('cliente.creditos.show', $credito) }}"
                                class="text-blue-600 underline hover:text-blue-800">
                                Ver
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No tienes créditos registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
