@extends('layouts.app')

@section('title', 'Dashboard Administrador')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-green-50 to-white">
    
    <!-- Hero mejorado con gradiente -->
    <section class="bg-gradient-to-br from-green-900 via-green-800 to-green-700 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center mb-6">
                <div class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mr-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-extrabold text-white tracking-tight">
                        Dashboard Administrativo
                    </h1>
                    <p class="text-green-200 text-lg mt-1">
                        Cooperativa El Progreso - Panel de control
                    </p>
                </div>
            </div>
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                <h2 class="text-2xl font-bold text-white mb-2">
                    👋 Bienvenido, {{ Auth::user()->name }}
                </h2>
                <p class="text-green-100">Gestiona usuarios, créditos y reportes desde un solo lugar</p>
            </div>
        </div>
    </section>

    <!-- Métricas clave mejoradas -->
    <section class="py-16 max-w-7xl mx-auto px-6">
        <h3 class="text-2xl font-bold text-green-900 mb-8 flex items-center">
            <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
            </svg>
            Métricas del Sistema
        </h3>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Usuarios -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center group-hover:bg-green-200 transition">
                        <svg class="w-6 h-6 text-green-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-extrabold text-green-900">{{ $totalUsuarios }}</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Usuarios Totales</h4>
                <div class="text-sm text-gray-600 space-y-1">
                    <div class="flex justify-between">
                        <span>Administradores</span>
                        <span class="font-semibold text-green-700">{{ $totalAdmins }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Empleados</span>
                        <span class="font-semibold text-blue-600">{{ $totalEmpleados }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Clientes</span>
                        <span class="font-semibold text-purple-600">{{ $totalClientes }}</span>
                    </div>
                </div>
            </div>

            <!-- Solicitudes -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-yellow-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-2xl flex items-center justify-center group-hover:bg-yellow-200 transition">
                        <svg class="w-6 h-6 text-yellow-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V5z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-extrabold text-yellow-900">{{ $totalSolicitudes }}</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Solicitudes</h4>
                <div class="text-sm text-gray-600">
                    Total recibidas este mes
                </div>
                @if($pendientes > 0)
                <div class="mt-3 inline-flex items-center px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold border border-red-200">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                    </svg>
                    {{ $pendientes }} pendientes
                </div>
                @endif
            </div>

            <!-- Créditos Activos -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition">
                        <svg class="w-6 h-6 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-extrabold text-blue-900">{{ $creditosActivos }}</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Créditos Activos</h4>
                <div class="text-sm text-gray-600">
                    En circulación actualmente
                </div>
            </div>

            <!-- Reportes -->
            <a href="{{ route('administrador.reportes.index') }}" class="group bg-white rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 block">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center group-hover:bg-purple-200 transition">
                        <svg class="w-6 h-6 text-purple-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-extrabold text-purple-900">📈</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Reportes</h4>
                <div class="text-sm text-gray-600">
                    Generar análisis y estadísticas
                </div>
            </a>
        </div>
    </section>

    <!-- Acciones rápidas mejoradas -->
    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-2xl font-bold text-green-900 mb-8 flex items-center">
                <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                </svg>
                Accesos Rápidos
            </h3>
            <div class="grid md:grid-cols-4 gap-6">
                @php
                    $acciones = [
                        [
                            'route' => route('administrador.users.index'),
                            'icon' => '<svg class="w-8 h-8 text-green-700" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>',
                            'title' => 'Usuarios',
                            'subtitle' => 'Administrar roles',
                            'color' => 'green'
                        ],
                        [
                            'route' => route('administrador.clients.index'),
                            'icon' => '<svg class="w-8 h-8 text-blue-700" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/></svg>',
                            'title' => 'Clientes',
                            'subtitle' => 'Datos crediticios',
                            'color' => 'blue'
                        ],
                        [
                            'route' => route('administrador.creditos.index'),
                            'icon' => '<svg class="w-8 h-8 text-yellow-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/></svg>',
                            'title' => 'Créditos',
                            'subtitle' => 'Solicitudes y gestión',
                            'color' => 'yellow',
                            'badge' => $pendientes
                        ],
                        [
                            'route' => route('administrador.reportes.index'),
                            'icon' => '<svg class="w-8 h-8 text-purple-700" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/></svg>',
                            'title' => 'Reportes',
                            'subtitle' => 'Análisis y datos',
                            'color' => 'purple'
                        ]
                    ];
                @endphp
                
                @foreach($acciones as $accion)
                <a href="{{ $accion['route'] }}" 
                   class="group bg-white rounded-2xl p-6 shadow-lg border border-{{ $accion['color'] }}-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 block">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-{{ $accion['color'] }}-100 rounded-2xl flex items-center justify-center group-hover:bg-{{ $accion['color'] }}-200 transition">
                            {!! $accion['icon'] !!}
                        </div>
                        @if(isset($accion['badge']) && $accion['badge'] > 0)
                        <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full font-bold animate-pulse">
                            {{ $accion['badge'] }}
                        </span>
                        @endif
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-1">{{ $accion['title'] }}</h4>
                    <p class="text-sm text-gray-600">{{ $accion['subtitle'] }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Últimas solicitudes mejoradas -->
    <section class="py-16 bg-green-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-green-100">
                <div class="p-8 border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-green-900 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                        </svg>
                        Últimas Solicitudes de Crédito
                    </h3>
                    <p class="text-gray-600 mt-2">Solicitudes recientes que requieren tu atención</p>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-green-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Cliente</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Plan</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Monto</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-900 uppercase tracking-wider">Fecha</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($ultimasSolicitudes as $solicitud)
                            <tr class="hover:bg-green-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-green-700 font-bold text-sm">{{ strtoupper(substr($solicitud->user->name, 0, 1)) }}</span>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-900">{{ $solicitud->user->name }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $solicitud->plan }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">${{ number_format($solicitud->monto, 2) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $badgeColors = [
                                            'pendiente' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                            'aprobado' => 'bg-green-100 text-green-800 border-green-200',
                                            'rechazado' => 'bg-red-100 text-red-800 border-red-200'
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border {{ $badgeColors[$solicitud->estado] }}">
                                        {{ ucfirst($solicitud->estado) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $solicitud->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                                    </svg>
                                    <p class="text-gray-600 font-semibold">No hay solicitudes recientes</p>
                                    <p class="text-sm">Las nuevas solicitudes aparecerán aquí</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if(!$ultimasSolicitudes->isEmpty())
                <div class="p-6 border-t border-gray-200 text-center">
                    <a href="{{ route('administrador.creditos.index') }}" class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition-all duration-200 shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-1.293a1 1 0 00-1.414-1.414L9 10.586 7.707 11.707a1 1 0 11-1.414-1.414l2-2a1 1 0 011.414 0l4 4z"/>
                        </svg>
                        Ver todas las solicitudes
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>

</div>
@endsection