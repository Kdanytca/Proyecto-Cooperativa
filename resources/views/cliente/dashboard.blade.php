@extends('layouts.app')

@section('title', 'Mi Dashboard - Cooperativa El Progreso')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-green-50 to-white">
    
    <!-- Hero con gradiente -->
    <section class="bg-gradient-to-br from-green-900 via-green-800 to-green-700 py-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20">
                <div class="flex items-center mb-4">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-extrabold text-white">
                            👋 Bienvenido, {{ Auth::user()->name }}
                        </h1>
                        <p class="text-green-200 text-lg mt-1">Cliente - Panel de control</p>
                    </div>
                </div>
                <p class="text-green-100">
                    Gestiona tus créditos, pagos y solicita nuevos servicios desde aquí.
                </p>
            </div>
        </div>
    </section>

    <!-- Métricas clave del cliente -->
    <section class="py-16 max-w-6xl mx-auto px-6">
        <h3 class="text-2xl font-bold text-green-900 mb-8 flex items-center">
            <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
            </svg>
            Mi Resumen Financiero
        </h3>
        
        @if($creditoActivo)
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <!-- Saldo Pendiente -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center group-hover:bg-green-200 transition">
                        <svg class="w-6 h-6 text-green-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-extrabold text-green-900">${{ number_format($saldoPendiente, 2) }}</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Saldo Pendiente</h4>
                <p class="text-sm text-gray-600">Total por pagar</p>
            </div>

            <!-- Próximo Pago -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition">
                        <svg class="w-6 h-6 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                        </svg>
                    </div>
                    @if($proximoPago)
                    <div class="text-right">
                        <span class="text-2xl font-extrabold text-blue-900">${{ number_format($proximoPago->monto, 2) }}</span>
                        <p class="text-sm text-blue-700">{{ $proximoPago->fecha_vencimiento->format('d/m/Y') }}</p>
                    </div>
                    @else
                    <span class="text-lg font-semibold text-gray-600">Sin pagos</span>
                    @endif
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Próximo Pago</h4>
                <p class="text-sm text-gray-600">{{ $proximoPago ? 'Vence el ' . $proximoPago->fecha_vencimiento->format('d/m/Y') : 'No hay pagos pendientes' }}</p>
            </div>

            <!-- Pagos Realizados -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center group-hover:bg-purple-200 transition">
                        <svg class="w-6 h-6 text-purple-700" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-extrabold text-purple-900">{{ $pagosRealizados }}</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Pagos Realizados</h4>
                <p class="text-sm text-gray-600">Cuotas canceladas</p>
            </div>
        </div>

        <!-- Info del crédito activo -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-green-100 mb-12">
            <div class="flex items-center mb-4">
                <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V5z"/>
                </svg>
                <h4 class="text-xl font-bold text-green-900">Crédito Activo</h4>
            </div>
            <div class="grid md:grid-cols-4 gap-4 text-center">
                <div>
                    <div class="text-2xl font-bold text-gray-900">${{ number_format($creditoActivo->monto, 2) }}</div>
                    <div class="text-sm text-gray-600">Monto original</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ $creditoActivo->plan }}</div>
                    <div class="text-sm text-gray-600">Plan</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ $creditoActivo->plazo_meses }} meses</div>
                    <div class="text-sm text-gray-600">Plazo</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ $creditoActivo->interes }}%</div>
                    <div class="text-sm text-gray-600">Interés</div>
                </div>
            </div>
        </div>
        @else
        <!-- Mensaje cuando no tiene crédito -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-8 text-center mb-12">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-yellow-900 mb-2">No tienes créditos activos</h3>
            <p class="text-yellow-700 mb-4">¿Listo para empezar? Solicita tu primer crédito con nosotros.</p>
            <a href="{{ route('creditos.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-yellow-900 rounded-xl font-bold hover:from-yellow-500 hover:to-yellow-600 transition-all duration-200 shadow-md hover:shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V5z"/>
                </svg>
                Solicitar Mi Crédito
            </a>
        </div>
        @endif

        <!-- Acciones rápidas -->
        <section class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 mb-12">
            <h3 class="text-2xl font-bold text-green-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                </svg>
                Acciones Rápidas
            </h3>
            <div class="grid md:grid-cols-3 gap-6">
                <a href="{{ route('cliente.creditos.index') }}" 
                   class="group bg-white rounded-xl p-6 shadow-md border border-green-100 hover:shadow-lg transition-all duration-200 hover:-translate-y-1 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-2xl flex items-center justify-center group-hover:bg-green-200 transition">
                        <svg class="w-8 h-8 text-green-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-green-900 mb-2">Mis Créditos</h4>
                    <p class="text-sm text-gray-600">Ver estado y detalles</p>
                </a>

                <a href="{{ route('creditos.index') }}" 
                   class="group bg-white rounded-xl p-6 shadow-md border border-blue-100 hover:shadow-lg transition-all duration-200 hover:-translate-y-1 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition">
                        <svg class="w-8 h-8 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V5z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-blue-900 mb-2">Solicitar Crédito</h4>
                    <p class="text-sm text-gray-600">Nuevos planes disponibles</p>
                </a>

                <a href="{{ route('cliente.reporte.generar') }}" 
                   class="group bg-white rounded-xl p-6 shadow-md border border-purple-100 hover:shadow-lg transition-all duration-200 hover:-translate-y-1 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-purple-100 rounded-2xl flex items-center justify-center group-hover:bg-purple-200 transition">
                        <svg class="w-8 h-8 text-purple-700" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm3 5a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm0 4a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-purple-900 mb-2">Mi Reporte</h4>
                    <p class="text-sm text-gray-600">Descargar estado de cuenta</p>
                </a>
            </div>
        </section>

        <!-- Historial de pagos -->
        <section class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-2xl font-bold text-green-900 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V5z"/>
                    </svg>
                    Últimos Pagos Realizados
                </h3>
                <p class="text-gray-600 mt-2">Historial de tus últimas cuotas canceladas</p>
            </div>
            
            <div class="overflow-x-auto">
                @if($ultimosPagos->count() > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-green-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Fecha de Pago</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Cuota #</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Monto</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($ultimosPagos as $pago)
                        <tr class="hover:bg-green-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $pago->fecha_pago ? $pago->fecha_pago->format('d/m/Y') : $pago->updated_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                Cuota #{{ $pago->numero_cuota }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                ${{ number_format($pago->monto, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-200">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                    </svg>
                                    Pagado
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"/>
                    </svg>
                    <h4 class="text-lg font-semibold text-gray-600 mb-2">No hay pagos registrados</h4>
                    <p class="text-gray-500">Los pagos realizados aparecerán aquí automáticamente</p>
                </div>
                @endif
            </div>
        </section>
    </section>
</div>
@endsection