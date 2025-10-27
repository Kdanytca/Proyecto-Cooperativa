@extends('layouts.app')

@section('title', 'Nosotros - Cooperativa El Progreso')

@section('content')
    <div class="py-12 bg-green-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Hero -->
            <section class="bg-white rounded-xl shadow p-8 text-center">
                <h1 class="text-3xl font-extrabold text-green-900">🌿 Cooperativa El Progreso</h1>
                <p class="mt-3 text-gray-600 max-w-3xl mx-auto">
                    Desde 2025 acompañamos a familias y pequeñas empresas a construir un futuro financiero más
                    estable y justo. Ofrecemos créditos responsables, asesoría personalizada y solidaridad
                    cooperativa en cada paso.
                </p>
                <div class="mt-6 flex justify-center gap-4">
                    <a href="{{ route('creditos.index') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                        📝 Solicitar crédito
                    </a>
                    <a href="{{ route('cliente.dashboard') }}"
                        class="px-4 py-2 bg-white border border-green-200 text-green-800 rounded-lg shadow hover:bg-green-50 transition">
                        🔍 Mi panel
                    </a>
                </div>
            </section>

            <!-- Misión / Visión / Valores -->
            <section class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <h3 class="text-xl font-semibold text-green-800">🎯 Misión</h3>
                    <p class="mt-3 text-gray-600 text-sm">
                        Brindar soluciones financieras accesibles y responsables que permitan el crecimiento
                        económico de nuestros asociados, con transparencia y trato humano.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <h3 class="text-xl font-semibold text-green-800">🔭 Visión</h3>
                    <p class="mt-3 text-gray-600 text-sm">
                        Ser la cooperativa de referencia en la región por nuestra cercanía, solidez y compromiso
                        con el desarrollo sostenible de nuestras comunidades.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <h3 class="text-xl font-semibold text-green-800">💚 Valores</h3>
                    <ul class="mt-3 text-gray-600 text-sm space-y-2 list-inside">
                        <li>• Solidaridad</li>
                        <li>• Transparencia</li>
                        <li>• Responsabilidad</li>
                        <li>• Cercanía</li>
                    </ul>
                </div>
            </section>

            <!-- Historia breve -->
            <section class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-2xl font-semibold text-green-800 mb-3">Nuestra Historia</h3>
                <p class="text-gray-600">
                    Empezamos como un grupo de vecinos que querían facilitar acceso al crédito para microproyectos.
                    Con el tiempo crecimos, pero mantuvimos la filosofía: prioridad a la gente. Hoy apoyamos a
                    cientos de asociados con productos simples, transparentes y adaptados a sus necesidades.
                </p>
            </section>

            <!-- Equipo -->
            <section class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-2xl font-semibold text-green-800 mb-6">Equipo</h3>

                <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <!-- Miembro 1 -->
                    <div class="text-center">
                        <div class="w-28 h-28 mx-auto rounded-full overflow-hidden bg-green-100">
                            <img src="{{ asset('images/equipo/kevin.jpg') }}" alt="Kevin Alegría"
                                class="w-full h-full object-cover">
                        </div>
                        <h4 class="mt-3 font-semibold text-gray-800">Kevin Alegría</h4>
                        <p class="text-sm text-gray-500">Gerente General</p>
                    </div>

                    <!-- Miembro 2 -->
                    <div class="text-center">
                        <div class="w-28 h-28 mx-auto rounded-full overflow-hidden bg-green-100">
                            <img src="{{ asset('images/equipo/alejandra.jpg') }}" alt="Alejandra Díaz"
                                class="w-full h-full object-cover">
                        </div>
                        <h4 class="mt-3 font-semibold text-gray-800">Alejandra Díaz</h4>
                        <p class="text-sm text-gray-500">Jefa de Créditos</p>
                    </div>

                    <!-- Miembro 3 -->
                    <div class="text-center">
                        <div class="w-28 h-28 mx-auto rounded-full overflow-hidden bg-green-100">
                            <img src="{{ asset('images/equipo/fatima.jpg') }}" alt="Fátima Hernández"
                                class="w-full h-full object-cover">
                        </div>
                        <h4 class="mt-3 font-semibold text-gray-800">Fátima Hernández</h4>
                        <p class="text-sm text-gray-500">Atención a Asociados</p>
                    </div>

                    <!-- Miembro 4 -->
                    <div class="text-center">
                        <div class="w-28 h-28 mx-auto rounded-full overflow-hidden bg-green-100">
                            <img src="{{ asset('images/equipo/evelin.jpg') }}" alt="Evelin Vásquez"
                                class="w-full h-full object-cover">
                        </div>
                        <h4 class="mt-3 font-semibold text-gray-800">Evelin Vásquez</h4>
                        <p class="text-sm text-gray-500">Soporte Técnico</p>
                    </div>
                </div>
            </section>


            <!-- Cómo trabajamos / CTA -->
            <section class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="text-xl font-semibold text-green-800 mb-3">Cómo trabajamos</h3>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Evaluamos cada solicitud con criterios claros, ofrecemos plazos justos y acompañamos al
                    asociado durante todo el proceso. Nuestro objetivo es que cada crédito sea una oportunidad.
                </p>

                <div class="mt-6 flex justify-center gap-4">
                    <a href="{{ route('creditos.index') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                        Solicitar crédito
                    </a>
                    <a href="mailto:soporte@cooperativa.pro"
                        class="px-4 py-2 bg-white border border-green-200 text-green-800 rounded-lg shadow hover:bg-green-50 transition">
                        Contactar soporte
                    </a>
                </div>
            </section>

            <!-- Datos de contacto -->
            <section class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-lg font-semibold text-green-800 mb-2">Contáctanos</h3>
                <p class="text-gray-600">Tel: <a href="tel:+50312345678" class="text-green-700">+503 1234 5678</a></p>
                <p class="text-gray-600">Email: <a href="mailto:info@cooperativa.pro"
                        class="text-green-700">info@cooperativa.pro</a></p>
                <p class="text-gray-600 mt-2">Dirección: ITCA-FEPADE ZACATECOLUCA LA PAZ</p>
            </section>

        </div>
    </div>
@endsection
