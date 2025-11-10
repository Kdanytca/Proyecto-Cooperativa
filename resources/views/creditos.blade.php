@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-6">
        <!-- Header con llamado a la acción -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-green-900 mb-4">Planes de Crédito Flexibles</h2>
            <p class="text-green-700 text-lg max-w-3xl mx-auto">
                Elige el plan que mejor se adapte a tus necesidades. Cálculos transparentes, aprobación rápida y pagos fijos.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Plan Básico -->
            <div class="relative bg-white rounded-2xl p-8 shadow-xl border border-green-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center bg-gradient-to-br from-green-100 to-green-200 rounded-full">
                        <svg class="w-10 h-10 text-green-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900">Plan Básico</h3>
                    <p class="text-gray-600 mt-2 text-sm">Soluciones inmediatas para imprevistos</p>
                    
                    <!-- Monto destacado -->
                    <div class="mt-4 bg-green-50 rounded-lg p-4 border border-green-200">
                        <div class="text-3xl font-extrabold text-green-900">${{ number_format(1000, 0, ',', '.') }}</div>
                        <div class="text-sm text-green-700">Monto máximo</div>
                    </div>
                </div>

                <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>6 meses</strong> de plazo fijo</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>5% interés</strong> anual</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>Pagos fijos:</strong> ${{ number_format(170.94, 2) }}/mes</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm">Total a pagar: <strong>${{ number_format(1025.64, 2) }}</strong></span>
                    </li>
                </ul>

                <div class="border-t border-gray-200 pt-4">
                    <div class="text-xs text-gray-500 mb-4">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                        </svg>
                        Requisito: Ingresos anuales mínimos ${{ number_format(5000, 0, ',', '.') }}
                    </div>
                    
                    <button onclick="seleccionarPlan('Básico')"
                        class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-md hover:shadow-lg">
                        Solicitar Plan Básico
                    </button>
                </div>
            </div>

            <!-- Plan Estándar - DESTACADO -->
            <div class="relative bg-white rounded-2xl p-8 shadow-2xl border-2 border-green-500 transform scale-105">
                <!-- Ribbon de recomendado -->
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                    <span class="bg-green-500 text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg">
                        🏆 Más Popular
                    </span>
                </div>
                
                <div class="text-center mb-6">
                    <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200 rounded-full">
                        <svg class="w-10 h-10 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900">Plan Estándar</h3>
                    <p class="text-gray-600 mt-2 text-sm">Proyectos personales y familiares</p>
                    
                    <div class="mt-4 bg-blue-50 rounded-lg p-4 border border-blue-200">
                        <div class="text-3xl font-extrabold text-blue-900">${{ number_format(5000, 0, ',', '.') }}</div>
                        <div class="text-sm text-blue-700">Monto máximo</div>
                    </div>
                </div>

                <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>12 meses</strong> de plazo fijo</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>8% interés</strong> anual</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>Pagos fijos:</strong> ${{ number_format(452.47, 2) }}/mes</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm">Total a pagar: <strong>${{ number_format(5429.64, 2) }}</strong></span>
                    </li>
                </ul>

                <div class="border-t border-gray-200 pt-4">
                    <div class="text-xs text-gray-500 mb-4">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                        </svg>
                        Requisito: Ingresos anuales mínimos ${{ number_format(12000, 0, ',', '.') }}
                    </div>
                    
                    <button onclick="seleccionarPlan('Estándar')"
                        class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Solicitar Plan Estándar
                    </button>
                </div>
            </div>

            <!-- Plan Premium -->
            <div class="relative bg-white rounded-2xl p-8 shadow-xl border border-green-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center bg-gradient-to-br from-purple-100 to-purple-200 rounded-full">
                        <svg class="w-10 h-10 text-purple-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900">Plan Premium</h3>
                    <p class="text-gray-600 mt-2 text-sm">Grandes metas y proyectos empresariales</p>
                    
                    <div class="mt-4 bg-purple-50 rounded-lg p-4 border border-purple-200">
                        <div class="text-3xl font-extrabold text-purple-900">${{ number_format(10000, 0, ',', '.') }}</div>
                        <div class="text-sm text-purple-700">Monto máximo</div>
                    </div>
                </div>

                <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>24 meses</strong> de plazo fijo</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>12% interés</strong> anual</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm"><strong>Pagos fijos:</strong> ${{ number_format(470.73, 2) }}/mes</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-gray-700 text-sm">Total a pagar: <strong>${{ number_format(11297.52, 2) }}</strong></span>
                    </li>
                </ul>

                <div class="border-t border-gray-200 pt-4">
                    <div class="text-xs text-gray-500 mb-4">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                        </svg>
                        Requisito: Ingresos anuales mínimos ${{ number_format(25000, 0, ',', '.') }}
                    </div>
                    
                    <button onclick="seleccionarPlan('Premium')"
                        class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-md hover:shadow-lg">
                        Solicitar Plan Premium
                    </button>
                </div>
            </div>
        </div>

        <!-- Sección informativa (reemplaza la calculadora) -->
        <div class="mt-12 bg-green-50 rounded-xl p-6 border border-green-200">
            <h4 class="text-lg font-bold text-green-900 mb-3 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1z"/>
                </svg>
                ¿Cómo funciona tu crédito?
            </h4>
            <p class="text-green-700 text-sm">
                Usamos el sistema francés: pagos mensuales <strong>iguales</strong> con interés sobre saldo restante. 
                Aprobación en 24-48 horas, sin condiciones ocultas ni letra pequeña.
            </p>
        </div>
    </div>

    <!-- Modal actualizado -->
    <div id="modalPlan" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-xl p-8 w-96 text-center shadow-2xl transform transition-all">
            <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </div>
            
            <h3 id="modalTitle" class="text-2xl font-bold text-green-900 mb-2"></h3>
            <p class="text-gray-600 mb-6">¿Confirmas la solicitud de este plan?</p>
            
            <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
                <div id="modalDetalles" class="text-sm text-gray-700 space-y-1">
                    <!-- Los detalles se llenarán con JavaScript -->
                </div>
            </div>

            <div class="flex justify-center gap-3">
                @auth
                    <form method="POST" action="{{ route('prestamos.store') }}">
                        @csrf
                        <input type="hidden" id="planSeleccionado" name="plan">
                        <button type="submit"
                            class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-2 rounded-lg font-semibold hover:from-green-700 hover:to-green-800 transition-all duration-200 shadow-md">
                            Confirmar Solicitud
                        </button>
                    </form>
                @else
                    <a href="{{ route('register') }}"
                        class="bg-yellow-400 px-6 py-2 rounded-lg text-green-900 font-semibold hover:bg-yellow-300 transition-all">
                        Registrarse
                    </a>
                    <a href="{{ route('login') }}"
                        class="bg-blue-600 px-6 py-2 rounded-lg text-white font-semibold hover:bg-blue-500 transition-all">
                        Iniciar Sesión
                    </a>
                @endauth
                <button onclick="cerrarModal()"
                    class="bg-gray-400 px-6 py-2 rounded-lg text-white font-semibold hover:bg-gray-500 transition-all">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <script>
        const planesDetalles = {
            'Básico': {
                monto: '$1,000',
                plazo: '6 meses',
                cuota: '$170.94',
                total: '$1,025.64'
            },
            'Estándar': {
                monto: '$5,000',
                plazo: '12 meses',
                cuota: '$452.47',
                total: '$5,429.64'
            },
            'Premium': {
                monto: '$10,000',
                plazo: '24 meses',
                cuota: '$470.73',
                total: '$11,297.52'
            }
        };

        function seleccionarPlan(plan) {
            document.getElementById('modalPlan').classList.remove('hidden');
            document.getElementById('modalTitle').innerText = "Plan " + plan;
            document.getElementById('planSeleccionado').value = plan;
            
            // Actualizar detalles en el modal
            const detalles = planesDetalles[plan];
            document.getElementById('modalDetalles').innerHTML = `
                <div class="flex justify-between"><span>Monto:</span><strong>${detalles.monto}</strong></div>
                <div class="flex justify-between"><span>Plazo:</span><strong>${detalles.plazo}</strong></div>
                <div class="flex justify-between"><span>Cuota mensual:</span><strong>${detalles.cuota}</strong></div>
                <div class="flex justify-between"><span>Total a pagar:</span><strong>${detalles.total}</strong></div>
            `;
        }

        function cerrarModal() {
            document.getElementById('modalPlan').classList.add('hidden');
        }
    </script>
@endsection