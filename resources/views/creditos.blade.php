@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-6">
        <h2 class="text-3xl font-bold text-center text-green-900 mb-10">Nuestros Planes de Crédito</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Plan Básico -->
            <div
                class="bg-white shadow-xl rounded-2xl p-8 flex flex-col items-center text-center border border-green-200 min-h-[350px]">
                <div class="w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                    💵
                </div>
                <h3 class="text-2xl font-bold text-green-900">Plan Básico</h3>
                <p class="text-gray-600 mt-2">Ideal para cubrir necesidades rápidas o imprevistos.</p>
                <ul class="mt-4 text-gray-700 space-y-1 text-sm">
                    <li>✔️ Monto hasta <strong>$1,000</strong></li>
                    <li>✔️ Plazo: 6 meses</li>
                    <li>✔️ Interés: 5%</li>
                    <li>✔️ Aprobación rápida</li>
                </ul>
                <br>
                <button onclick="seleccionarPlan('Básico')"
                    class="mt-auto bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
                    Solicitar
                </button>
            </div>

            <!-- Plan Estándar -->
            <div
                class="bg-white shadow-xl rounded-2xl p-8 flex flex-col items-center text-center border border-green-200 min-h-[350px]">
                <div class="w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                    📊
                </div>
                <h3 class="text-2xl font-bold text-green-900">Plan Estándar</h3>
                <p class="text-gray-600 mt-2">Pensado para proyectos personales o familiares.</p>
                <ul class="mt-4 text-gray-700 space-y-1 text-sm">
                    <li>✔️ Monto hasta <strong>$5,000</strong></li>
                    <li>✔️ Plazo: 12 meses</li>
                    <li>✔️ Interés: 8%</li>
                    <li>✔️ Flexibilidad en pagos</li>
                </ul>
                <br>
                <button onclick="seleccionarPlan('Estándar')"
                    class="mt-auto bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
                    Solicitar
                </button>
            </div>

            <!-- Plan Premium -->
            <div
                class="bg-white shadow-xl rounded-2xl p-8 flex flex-col items-center text-center border border-green-200 min-h-[350px]">
                <div class="w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                    🌟
                </div>
                <h3 class="text-2xl font-bold text-green-900">Plan Premium</h3>
                <p class="text-gray-600 mt-2">El plan más completo para grandes metas y negocios.</p>
                <ul class="mt-4 text-gray-700 space-y-1 text-sm">
                    <li>✔️ Monto hasta <strong>$10,000</strong></li>
                    <li>✔️ Plazo: 24 meses</li>
                    <li>✔️ Interés: 12%</li>
                    <li>✔️ Asesoría personalizada</li>
                </ul>
                <br>
                <button onclick="seleccionarPlan('Premium')"
                    class="mt-auto bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
                    Solicitar
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalPlan" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-96 text-center">
            <h3 id="modalTitle" class="text-xl font-bold text-green-900"></h3>
            <p class="mt-2 text-gray-700">¿Quieres solicitar este plan?</p>
            <div class="mt-4 flex justify-center gap-4">
                @auth
                    <form method="POST" action="{{ route('prestamos.store') }}">
                        @csrf
                        <input type="hidden" id="planSeleccionado" name="plan">
                        <button type="submit"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Confirmar</button>
                    </form>
                @else
                    <a href="{{ route('register') }}"
                        class="bg-yellow-400 px-4 py-2 rounded-lg text-green-900 font-semibold hover:bg-yellow-300">Registrarse</a>
                    <a href="{{ route('login') }}"
                        class="bg-blue-600 px-4 py-2 rounded-lg text-white font-semibold hover:bg-blue-500">Iniciar Sesión</a>
                @endauth
                <button onclick="cerrarModal()"
                    class="bg-gray-400 px-4 py-2 rounded-lg text-white hover:bg-gray-500">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        function seleccionarPlan(plan) {
            document.getElementById('modalPlan').classList.remove('hidden');
            document.getElementById('modalTitle').innerText = "Plan " + plan;
            document.getElementById('planSeleccionado').value = plan;
        }

        function cerrarModal() {
            document.getElementById('modalPlan').classList.add('hidden');
        }
    </script>
@endsection
