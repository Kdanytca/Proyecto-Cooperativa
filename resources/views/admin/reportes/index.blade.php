@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6 space-y-8">

        {{-- ========================= --}}
        {{-- 🔹 REPORTE DE CRÉDITOS --}}
        {{-- ========================= --}}
        <div>
            <h2 class="text-xl font-semibold text-green-800 mb-4">📊 Generar Reporte de Créditos</h2>

            <form action="{{ route('administrador.reportes.generar') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">Tipo de reporte</label>
                    <select name="tipo" class="w-full border rounded-lg p-2" required>
                        <option value="todos">Todos</option>
                        <option value="pendiente">Pendientes</option>
                        <option value="aprobado">Aprobados</option>
                        <option value="rechazado">Rechazados</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">Cliente (opcional)</label>
                    <select name="cliente_id" class="w-full border rounded-lg p-2">
                        <option value="">Todos</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Nuevo: filtro por monto --}}
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">Monto del crédito</label>
                    <select name="monto" class="w-full border rounded-lg p-2">
                        <option value="">Todos</option>
                        <option value="1000">1,000 USD (6%)</option>
                        <option value="5000">5,000 USD (8%)</option>
                        <option value="10000">10,000 USD (12%)</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Desde</label>
                        <input type="date" name="fecha_inicio" class="w-full border rounded-lg p-2">
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Hasta</label>
                        <input type="date" name="fecha_fin" class="w-full border rounded-lg p-2">
                    </div>
                </div>

                <button type="submit"
                    class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 w-full md:w-auto">
                    Generar PDF de Créditos
                </button>
            </form>
        </div>

        {{-- ========================= --}}
        {{-- 🔹 REPORTE DE CLIENTES --}}
        {{-- ========================= --}}
        <div class="border-t border-gray-300 pt-6">
            <h2 class="text-xl font-semibold text-green-800 mb-4">👥 Reporte de Clientes</h2>
            <p class="text-sm text-gray-600 mb-4">
                Descarga una lista con todos los clientes registrados y verifica quiénes ya tienen su perfil crediticio
                completo.
            </p>

            <form action="{{ route('administrador.reportes.clientes') }}" method="POST">
                @csrf
                <div class="flex items-center gap-4">
                    <select name="estado_perfil" class="border rounded-lg p-2 flex-1">
                        <option value="todos">Todos</option>
                        <option value="completos">Solo completos</option>
                        <option value="incompletos">Solo incompletos</option>
                    </select>

                    <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
                        Descargar PDF
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
