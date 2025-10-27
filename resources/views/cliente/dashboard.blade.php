@extends('layouts.app')

@section('title', 'Dashboard Cliente')

@section('content')
    <div class="py-12 bg-green-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Bienvenida -->
            <div class="bg-white p-8 rounded-xl shadow text-center">
                <h2 class="text-2xl font-bold text-green-800">
                    👋 Hola, {{ Auth::user()->name }}
                </h2>
                <p class="text-gray-600 mt-2">Bienvenido a tu panel de la Cooperativa El Progreso</p>
            </div>

            @if ($creditoActivo)
                <!-- Resumen financiero dinámico -->
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-green-100 p-6 rounded-xl text-center shadow">
                        <h3 class="text-xl font-semibold text-green-800">💳 Saldo pendiente</h3>
                        <p class="mt-2 text-2xl font-bold text-green-900">
                            ${{ number_format($saldoPendiente, 2) }}
                        </p>
                    </div>
                    <div class="bg-green-100 p-6 rounded-xl text-center shadow">
                        <h3 class="text-xl font-semibold text-green-800">📅 Próximo pago</h3>
                        @if ($proximoPago)
                            <p class="mt-2 text-lg text-gray-700">
                                {{ $proximoPago->fecha_vencimiento->format('d/m/Y') }} -
                                ${{ number_format($proximoPago->monto, 2) }}
                            </p>
                        @else
                            <p class="mt-2 text-gray-600">Sin pagos pendientes</p>
                        @endif
                    </div>
                    <div class="bg-green-100 p-6 rounded-xl text-center shadow">
                        <h3 class="text-xl font-semibold text-green-800">✅ Pagos realizados</h3>
                        <p class="mt-2 text-2xl font-bold text-green-900">{{ $pagosRealizados }}</p>
                    </div>
                </div>
            @else
                <!-- Si no tiene créditos activos -->
                <div class="bg-yellow-100 p-6 rounded-xl text-center shadow">
                    <h3 class="text-xl font-semibold text-yellow-800">⚠️ No tienes créditos activos</h3>
                    <p class="mt-2">Puedes solicitar uno nuevo cuando lo desees.</p>
                </div>
            @endif

            <!-- Acciones rápidas -->
            <div class="grid md:grid-cols-3 gap-6">
                <a href="{{ route('cliente.creditos.index') }}"
                    class="bg-white shadow-md hover:shadow-lg p-6 rounded-xl text-center transition">
                    🔍 <h4 class="text-lg font-bold text-green-800 mt-2">Consultar mis créditos</h4>
                </a>

                <a href="{{ route('creditos.index') }}"
                    class="bg-white shadow-md hover:shadow-lg p-6 rounded-xl text-center transition">
                    📝 <h4 class="text-lg font-bold text-green-800 mt-2">Solicitar nuevo crédito</h4>
                </a>

                <!-- 🔽 NUEVA ACCIÓN: Descargar reporte personal -->
                <a href="{{ route('cliente.reporte.generar') }}"
                    class="bg-white shadow-md hover:shadow-lg p-6 rounded-xl text-center transition">
                    📄 <h4 class="text-lg font-bold text-green-800 mt-2">Descargar mi reporte</h4>
                </a>
            </div>

            <!-- Historial reciente -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-lg font-semibold text-green-800 mb-4">📄 Últimos pagos</h3>

                @if ($ultimosPagos->count() > 0)
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-green-200 text-green-900">
                                <th class="p-2">Fecha</th>
                                <th class="p-2">Monto</th>
                                <th class="p-2">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($ultimosPagos as $pago)
                                <tr>
                                    <td class="p-2">{{ $pago->updated_at->format('d/m/Y') }}</td>
                                    <td class="p-2">${{ number_format($pago->monto, 2) }}</td>
                                    <td class="p-2 text-green-700">Pagado</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No hay pagos registrados aún.</p>
                @endif
            </div>

        </div>
    </div>
@endsection
