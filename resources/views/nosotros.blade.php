@extends('layouts.app')

@section('title', 'Nosotros - Cooperativa El Progreso')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-green-50 to-white">

        <!-- Hero renovado con gradiente y mejor tipografía -->
        <section class="relative overflow-hidden bg-gradient-to-br from-green-900 to-green-700 text-white py-20">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative max-w-6xl mx-auto px-6 text-center">
                <div
                    class="w-24 h-24 mx-auto mb-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h1 class="text-5xl font-extrabold tracking-tight mb-4">Cooperativa El Progreso</h1>
                <p class="text-xl text-green-100 max-w-3xl mx-auto leading-relaxed">
                    Desde 2025 acompañamos a familias y pequeñas empresas a construir un futuro financiero más estable y
                    justo, con créditos responsables y asesoría personalizada.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('creditos.index') }}"
                        class="inline-flex items-center justify-center px-8 py-3 bg-white text-green-900 rounded-xl font-semibold shadow-lg hover:bg-green-50 transition-all duration-200 hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V5z" />
                        </svg>
                        Solicitar Crédito
                    </a>
                    <a href="#contacto"
                        class="inline-flex items-center justify-center px-8 py-3 bg-transparent border-2 border-white text-white rounded-xl font-semibold hover:bg-white hover:bg-opacity-10 transition-all duration-200 hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        Contactar
                    </a>
                </div>
            </div>
        </section>

        <!-- Misión, Visión, Valores con iconos SVG -->
        <section class="py-16 max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Misión -->
                <div
                    class="group bg-white p-8 rounded-2xl shadow-lg border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div
                        class="w-16 h-16 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition">
                        <svg class="w-8 h-8 text-green-700" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900 text-center mb-4">Misión</h3>
                    <p class="text-gray-600 text-center leading-relaxed">
                        Brindar soluciones financieras accesibles y responsables que permitan el crecimiento económico de
                        nuestros asociados, con transparencia y trato humano.
                    </p>
                </div>

                <!-- Visión -->
                <div
                    class="group bg-white p-8 rounded-2xl shadow-lg border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div
                        class="w-16 h-16 mx-auto mb-6 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition">
                        <svg class="w-8 h-8 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900 text-center mb-4">Visión</h3>
                    <p class="text-gray-600 text-center leading-relaxed">
                        Ser la cooperativa de referencia en la región por nuestra cercanía, solidez y compromiso con el
                        desarrollo sostenible de nuestras comunidades.
                    </p>
                </div>

                <!-- Valores -->
                <div
                    class="group bg-white p-8 rounded-2xl shadow-lg border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div
                        class="w-16 h-16 mx-auto mb-6 bg-purple-100 rounded-full flex items-center justify-center group-hover:bg-purple-200 transition">
                        <svg class="w-8 h-8 text-purple-700" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900 text-center mb-4">Valores</h3>
                    <ul class="text-gray-600 text-center space-y-2">
                        <li class="flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                            </svg>
                            Solidaridad
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                            </svg>
                            Transparencia
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                            </svg>
                            Responsabilidad
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                            </svg>
                            Cercanía
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Historia con imagen decorativa -->
        <section class="py-16 bg-green-50">
            <div class="max-w-6xl mx-auto px-6">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="md:flex">
                        <div class="p-8 md:p-12 md:w-2/3">
                            <h3 class="text-3xl font-bold text-green-900 mb-4">Nuestra Historia</h3>
                            <p class="text-gray-600 leading-relaxed mb-4">
                                Empezamos como un grupo de vecinos que querían facilitar acceso al crédito para
                                microproyectos. Con el tiempo crecimos, pero mantuvimos la filosofía: <strong>prioridad a la
                                    gente</strong>.
                            </p>
                            <p class="text-gray-600 leading-relaxed">
                                Hoy apoyamos a cientos de asociados con productos simples, transparentes y adaptados a sus
                                necesidades reales. Cada aprobación es una oportunidad de crecimiento para una familia o
                                negocio.
                            </p>
                        </div>
                        <div
                            class="md:w-1/3 bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center p-8">
                            <svg class="w-32 h-32 text-green-500 opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.314a1 1 0 011.414 1.414L11 13.485V14.5a.5.5 0 00.5.5h.01zM12.5 5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Estadísticas de confianza -->
        <section class="py-16 max-w-6xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-green-900 text-center mb-12">Nuestro Impacto</h3>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-green-600 mb-2" x-data="{ count: 0 }"
                        x-init="setTimeout(() => count = 350, 500)">
                        <span x-text="count.toLocaleString()"></span>+
                    </div>
                    <div class="text-gray-700 font-medium">Asociados Activos</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-blue-600 mb-2" x-data="{ count: 0 }" x-init="setTimeout(() => count = 95, 500)">
                        <span x-text="count"></span>%
                    </div>
                    <div class="text-gray-700 font-medium">Aprobaciones</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-purple-600 mb-2" x-data="{ count: 0 }"
                        x-init="setTimeout(() => count = 24, 500)">
                        <span x-text="count"></span>h
                    </div>
                    <div class="text-gray-700 font-medium">Respuesta Rápida</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-orange-600 mb-2" x-data="{ count: 0 }"
                        x-init="setTimeout(() => count = 5, 500)">
                        <span x-text="count"></span>
                    </div>
                    <div class="text-gray-700 font-medium">Años de Experiencia</div>
                </div>
            </div>
        </section>

        <!-- Equipo renovado -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-6">
                <h3 class="text-3xl font-bold text-green-900 text-center mb-4">Nuestro Equipo</h3>
                <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
                    Profesionales comprometidos con tu crecimiento financiero y el bienestar de nuestra comunidad.
                </p>

                <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
                    @php
                        $miembros = [
                            [
                                'nombre' => 'Kevin Alegría',
                                'cargo' => 'Gerente General',
                                'img' => 'k.jpg',
                                'color' => 'green',
                            ],
                            [
                                'nombre' => 'Alejandra Díaz',
                                'cargo' => 'Jefa de Créditos',
                                'img' => 'g.webp',
                                'color' => 'blue',
                            ],
                            [
                                'nombre' => 'Fátima Hernández',
                                'cargo' => 'Atención a Asociados',
                                'img' => 'f.jpg',
                                'color' => 'purple',
                            ],
                            [
                                'nombre' => 'Evelin Vásquez',
                                'cargo' => 'Soporte Técnico',
                                'img' => 'e.jpg',
                                'color' => 'orange',
                            ],
                        ];
                    @endphp

                    @foreach ($miembros as $miembro)
                        <div class="group text-center">
                            <div class="relative w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden shadow-lg">
                                <img src="{{ asset('img/' . $miembro['img']) }}" alt="{{ $miembro['nombre'] }}"
                                    class="w-full h-full object-cover object-[center_-10px]">
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-1">{{ $miembro['nombre'] }}</h4>
                            <p class="text-sm text-gray-500 font-medium">{{ $miembro['cargo'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Testimonios -->
        <section class="py-16 bg-green-50">
            <div class="max-w-6xl mx-auto px-6">
                <h3 class="text-3xl font-bold text-green-900 text-center mb-12">Lo que dicen nuestros asociados</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-green-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-green-700 font-bold">MG</span>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">María González</div>
                                <div class="text-sm text-gray-500">Pequeña empresaria</div>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">"Gracias a El Progreso pude expandir mi negocio con un crédito
                            justo y transparente. El proceso fue rápido y el equipo muy cercano."</p>
                        <div class="mt-4 text-yellow-400">★★★★★</div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-green-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-blue-700 font-bold">JR</span>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">José Rivera</div>
                                <div class="text-sm text-gray-500">Agricultor</div>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">"Lo mejor es la claridad en los pagos. Siempre sabes cuánto debes y
                            el equipo te apoya cuando lo necesitas."</p>
                        <div class="mt-4 text-yellow-400">★★★★★</div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-green-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-purple-700 font-bold">LC</span>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Laura Cruz</div>
                                <div class="text-sm text-gray-500">Estudiante</div>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">"Mi crédito estudiantil me permitió terminar la universidad. Las
                            cuotas se adaptaron perfectamente a mi presupuesto."</p>
                        <div class="mt-4 text-yellow-400">★★★★★</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cómo trabajamos como pasos -->
        <section class="py-16 max-w-6xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-green-900 text-center mb-12">Proceso Simple y Transparente</h3>
            <div class="grid md:grid-cols-4 gap-8">
                @foreach ([['num' => '1', 'title' => 'Solicita', 'desc' => 'Elige tu plan y completa el formulario'], ['num' => '2', 'title' => 'Evaluamos', 'desc' => 'Analizamos tu perfil en 24-48 horas'], ['num' => '3', 'title' => 'Apruebas', 'desc' => 'Firma digitalmente tu contrato'], ['num' => '4', 'title' => 'Recibes', 'desc' => 'El dinero en tu cuenta inmediatamente']] as $step)
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-green-700">{{ $step['num'] }}</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">{{ $step['title'] }}</h4>
                        <p class="text-sm text-gray-600">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Contacto destacado -->
        <section id="contacto" class="bg-green-900 text-white py-16">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h3 class="text-3xl font-bold mb-4">¿Listo para dar el siguiente paso?</h3>
                <p class="text-green-200 mb-8 max-w-2xl mx-auto">
                    Nuestro equipo está listo para ayudarte a encontrar la mejor solución financiera para tus necesidades.
                </p>
                <div class="grid md:grid-cols-3 gap-8 mb-8">
                    <div class="flex items-center justify-center">
                        <svg class="w-6 h-6 mr-3 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <div class="text-left">
                            <div class="font-semibold">Teléfono</div>
                            <a href="tel:+50312345678" class="text-green-300 hover:text-white transition">+503 1234
                                5678</a>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <svg class="w-6 h-6 mr-3 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <div class="text-left">
                            <div class="font-semibold">Email</div>
                            <a href="mailto:info@cooperativa.pro"
                                class="text-green-300 hover:text-white transition">info@cooperativa.pro</a>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <svg class="w-6 h-6 mr-3 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                        <div class="text-left">
                            <div class="font-semibold">Visítanos</div>
                            <div class="text-green-300">ITCA-FEPADE ZACATECOLUCA LA PAZ</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('creditos.index') }}"
                    class="inline-flex items-center px-8 py-3 bg-white text-green-900 rounded-xl font-semibold shadow-lg hover:bg-green-50 transition-all duration-200 hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V5z" />
                    </svg>
                    Comenzar Ahora
                </a>
            </div>
        </section>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush
