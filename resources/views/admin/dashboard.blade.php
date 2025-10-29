@extends('layouts.app')

@section('title', 'Dashboard Administrador')

@section('content')
    <div class="py-12 bg-green-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Bienvenida -->
            <div class="bg-white p-8 rounded-xl shadow text-center">
                <h2 class="text-2xl font-bold text-green-900">
                    👋 Hola, {{ Auth::user()->name }}
                </h2>
                <p class="text-green-700 mt-2">Panel de control de la Cooperativa El Progreso</p>
            </div>

            <!-- Indicadores globales -->
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-yellow-100 p-6 rounded-xl text-center shadow flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-green-900">👥 Usuarios</h3>
                        <p class="mt-2 text-2xl font-bold text-green-800">
                            Total: {{ $totalUsuarios }}
                        </p>
                    </div>
                    <div class="mt-4 text-sm text-gray-700">
                        <p>Administradores: <span class="font-semibold">{{ $totalAdmins }}</span></p>
                        <p>Empleados: <span class="font-semibold">{{ $totalEmpleados }}</span></p>
                        <p>Clientes: <span class="font-semibold">{{ $totalClientes }}</span></p>
                    </div>
                </div>
                <div class="bg-yellow-100 p-6 rounded-xl text-center shadow">
                    <h3 class="text-xl font-semibold text-green-900">📋 Solicitudes</h3>
                    <p class="mt-2 text-2xl font-bold text-green-800">{{ $totalSolicitudes }}</p>
                </div>
                <div class="bg-yellow-100 p-6 rounded-xl text-center shadow">
                    <h3 class="text-xl font-semibold text-green-900">💵 Créditos activos</h3>
                    <p class="mt-2 text-2xl font-bold text-green-800">{{ $creditosActivos }}</p>
                </div>
            </div>

            <!-- Acciones rápidas -->
            <div class="grid md:grid-cols-4 gap-6">
                <a href="{{ route('administrador.users.index') }}"
                    class="bg-white shadow-md hover:shadow-lg p-6 rounded-xl text-center transition border border-green-200">
                    🧑‍💼
                    <h4 class="text-lg font-bold text-green-900 mt-2">Gestionar Usuarios</h4>
                </a>

                <a href="{{ route('administrador.clients.index') }}"
                    class="bg-white shadow-md hover:shadow-lg p-6 rounded-xl text-center transition border border-green-200">
                    👥
                    <h4 class="text-lg font-bold text-green-900 mt-2">Gestionar Clientes</h4>
                </a>

                <a href="{{ route('administrador.creditos.index') }}"
                    class="bg-white shadow-md hover:shadow-lg p-6 rounded-xl text-center transition border border-green-200">
                    💰
                    <h4 class="text-lg font-bold text-green-900 mt-2">Solicitudes de Créditos</h4>
                    @if ($pendientes > 0)
                        <span class="mt-2 inline-block bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                            {{ $pendientes }} pendientes
                        </span>
                    @endif
                </a>

                <!-- NUEVO BOTÓN DE REPORTES -->
                <a href="{{ route('administrador.reportes.index') }}"
                    class="bg-white shadow-md hover:shadow-lg p-6 rounded-xl text-center transition border border-green-200">
                    📊
                    <h4 class="text-lg font-bold text-green-900 mt-2">Generar Reportes</h4>
                    <p class="text-sm text-green-700 mt-1">Créditos, clientes, fechas...</p>
                </a>
            </div>


            <!-- Últimas solicitudes -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-lg font-semibold text-green-900 mb-4">📄 Últimas solicitudes de crédito</h3>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-green-200 text-green-900">
                            <th class="p-2">Cliente</th>
                            <th class="p-2">Monto</th>
                            <th class="p-2">Estado</th>
                            <th class="p-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-green-200">
                        @forelse ($ultimasSolicitudes as $solicitud)
                            <tr>
                                <td class="p-2">{{ $solicitud->user->name }}</td>
                                <td class="p-2">${{ number_format($solicitud->monto, 2) }}</td>
                                <td
                                    class="p-2 
                                    {{ $solicitud->estado == 'pendiente'
                                        ? 'text-yellow-600'
                                        : ($solicitud->estado == 'aprobado'
                                            ? 'text-green-700'
                                            : 'text-red-600') }}">
                                    {{ ucfirst($solicitud->estado) }}
                                </td>
                                <td class="p-2">{{ $solicitud->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-3 text-center text-gray-500">
                                    No hay solicitudes recientes
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
