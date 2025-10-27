@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-green-900">Solicitudes de Créditos</h2>
            <div>
                <a href="{{ route('creditos.gestion') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                    📜 Ver Historial de Créditos
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 rounded-lg text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead>
                    <tr class="bg-green-600 text-white">
                        <th class="px-4 py-2 text-left">Cliente</th>
                        <th class="px-4 py-2 text-left">Plan</th>
                        <th class="px-4 py-2 text-left">Monto</th>
                        <th class="px-4 py-2 text-left">Plazo</th>
                        <th class="px-4 py-2 text-left">Interés</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($creditos as $credito)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $credito->user->name }}</td>
                            <td class="px-4 py-2">{{ $credito->plan }}</td>
                            <td class="px-4 py-2">${{ number_format($credito->monto, 2) }}</td>
                            <td class="px-4 py-2">{{ $credito->plazo }} meses</td>
                            <td class="px-4 py-2">{{ $credito->interes }}%</td>
                            <td class="px-4 py-2">
                                @if ($credito->estado === 'pendiente')
                                    <span
                                        class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-xs">Pendiente</span>
                                @elseif($credito->estado === 'aprobado')
                                    <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs">Aprobado</span>
                                @elseif($credito->estado === 'rechazado')
                                    <span class="bg-red-200 text-red-800 px-2 py-1 rounded-full text-xs">Rechazado</span>
                                @else
                                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">Liquidado</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-center space-x-2">
                                @if ($credito->estado === 'pendiente')
                                    @php
                                        $perfil = $credito->user->perfilCrediticio;
                                        $incompleto = !$perfil || !$perfil->salario || !$perfil->telefono;
                                    @endphp

                                    <form action="{{ route('administrador.creditos.update', $credito->id) }}" method="POST"
                                        class="inline form-aprobar">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="estado" value="aprobado">

                                        <button type="{{ $incompleto ? 'button' : 'submit' }}"
                                            class="{{ $incompleto ? 'btn-aprobar bg-yellow-600 hover:bg-yellow-700' : 'bg-green-600 hover:bg-green-700' }} text-white px-3 py-1 rounded-lg text-sm"
                                            data-cliente="{{ $credito->user->name }}"
                                            data-edit-url="{{ route('administrador.clients.edit', $credito->user->id) }}">
                                            Aprobar
                                        </button>
                                    </form>

                                    <form action="{{ route('administrador.creditos.update', $credito->id) }}"
                                        method="POST" class="inline ml-2 form-rechazar">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="estado" value="rechazado">
                                        <button type="button"
                                            class="btn-rechazar bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 text-sm">
                                            Rechazar
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('creditos.show', $credito->id) }}"
                                        class="bg-indigo-600 text-white px-3 py-1 rounded-lg hover:bg-indigo-700 text-sm">
                                        Ver Detalle
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">
                                No hay solicitudes de créditos
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{-- SweetAlert confirmación --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // 🔹 Confirmación para aprobar con datos incompletos
        document.querySelectorAll('.btn-aprobar').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const cliente = this.dataset.cliente;
                const editUrl = this.dataset.editUrl;

                Swal.fire({
                    title: `¿Faltan datos de ${cliente}?`,
                    text: "Este cliente no tiene completo su perfil crediticio. ¿Deseas completarlo ahora?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, ir al perfil',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = editUrl;
                    }
                });
            });
        });

        // 🔹 Confirmación para rechazar crédito
        document.querySelectorAll('.btn-rechazar').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('.form-rechazar');

                Swal.fire({
                    title: '¿Rechazar esta solicitud?',
                    text: "Esta acción no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, rechazar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // envía el formulario solo si confirma
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                Swal.fire({
                    title: 'Cliente no apto ❌',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'Entendido'
                });
            @endif

            @if (session('warning'))
                Swal.fire({
                    title: 'Atención ⚠️',
                    text: "{{ session('warning') }}",
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    title: 'Éxito ✅',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            @endif
        });
    </script>
@endsection
