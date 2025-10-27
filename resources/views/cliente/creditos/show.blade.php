@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-green-900 mb-4">📄 Detalle del Crédito #{{ $credito->id }}</h2>

        {{-- Información del crédito --}}
        <div class="bg-white shadow rounded-lg p-4 mb-6 border border-gray-200">
            <p><strong>Plan:</strong> {{ $credito->plan }}</p>
            <p><strong>Monto:</strong> ${{ number_format($credito->monto, 2) }}</p>
            <p><strong>Plazo:</strong> {{ $credito->plazo_meses }} meses</p>
            <p><strong>Interés:</strong> {{ $credito->interes }}%</p>
            <p><strong>Estado:</strong>
                @if ($credito->estado == 'pendiente')
                    <span class="px-2 py-1 rounded bg-yellow-200 text-yellow-800">Pendiente</span>
                @elseif ($credito->estado == 'aprobado')
                    <span class="px-2 py-1 rounded bg-green-200 text-green-800">Aprobado</span>
                @elseif ($credito->estado == 'rechazado')
                    <span class="px-2 py-1 rounded bg-red-200 text-red-800">Rechazado</span>
                @else
                    <span class="px-2 py-1 rounded bg-gray-200 text-gray-800">{{ ucfirst($credito->estado) }}</span>
                @endif
            </p>
            <p><strong>Fecha de solicitud:</strong> {{ $credito->created_at->format('d/m/Y') }}</p>
            @if ($credito->fecha_aprobacion)
                <p><strong>Fecha de aprobación:</strong> {{ $credito->fecha_aprobacion->format('d/m/Y') }}</p>
            @endif
        </div>

        {{-- Tabla de cuotas (si está aprobado y existen cuotas) --}}
        @if ($credito->estado == 'aprobado' && $credito->cuotas->count() > 0)
            <h3 class="text-xl font-semibold text-green-800 mb-3">🧾 Cuotas</h3>

            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-green-100">
                    <tr>
                        <th class="px-4 py-2 text-left"># Cuota</th>
                        <th class="px-4 py-2 text-left">Monto</th>
                        <th class="px-4 py-2 text-left">Vencimiento</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($credito->cuotas as $cuota)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $cuota->numero_cuota }}</td>
                            <td class="px-4 py-2">${{ number_format($cuota->monto, 2) }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($cuota->fecha_vencimiento)->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-2">
                                @if ($cuota->estado == 'pendiente')
                                    <span class="px-2 py-1 rounded bg-yellow-200 text-yellow-800">Pendiente</span>
                                @elseif ($cuota->estado == 'pagada')
                                    <span class="px-2 py-1 rounded bg-green-200 text-green-800">Pagada</span>
                                @else
                                    <span class="px-2 py-1 rounded bg-red-200 text-red-800">Vencida</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                @if ($cuota->estado == 'pendiente')
                                    <form action="{{ route('cliente.cuotas.pagar', $cuota) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                            Pagar
                                        </button>
                                    </form>
                                @elseif ($cuota->estado == 'pagada')
                                    <span class="text-green-700 font-semibold">✔ Pagada</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Botón volver --}}
        <div class="mt-6">
            <a href="{{ route('cliente.creditos.index') }}" class="text-blue-600 hover:underline">
                ← Volver a mis créditos
            </a>
        </div>
    </div>
@endsection
