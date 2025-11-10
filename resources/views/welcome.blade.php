@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
    <!-- HERO MEJORADO -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-green-900 via-green-800 to-green-700">
        <div class="absolute inset-0 bg-black/20"></div>
        
        <!-- Círculos decorativos -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-green-500 rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-yellow-400 rounded-full opacity-10 blur-3xl"></div>
        
        <div class="relative max-w-5xl mx-auto px-6 text-center text-white">
            <div class="mb-8">
                <svg class="w-20 h-20 mx-auto mb-6 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6">
                    Cooperativa El Progreso
                </h1>
                <p class="text-xl md:text-2xl text-green-100 max-w-3xl mx-auto leading-relaxed">
                    Unimos esfuerzos para crecer juntos. Servicios financieros transparentes, apoyo comunitario y oportunidades para todos.
                </p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('creditos.index') }}" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 text-green-900 rounded-2xl font-bold shadow-xl hover:shadow-2xl hover:from-yellow-500 hover:to-yellow-600 transition-all duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V5z"/>
                    </svg>
                    Ver Planes de Crédito
                </a>
                <a href="/nosotros" 
                   class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white/30 text-white rounded-2xl font-bold hover:bg-white/10 backdrop-blur-sm transition-all duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                    </svg>
                    Conócenos Más
                </a>
            </div>
        </div>
    </section>

    <!-- SERVICIOS MEJORADOS -->
    <section id="servicios" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-green-900 mb-4">Nuestros Servicios</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Soluciones financieras diseñadas para ayudarte a alcanzar tus metas con seguridad y confianza.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Ahorros -->
                <div class="group relative bg-white rounded-2xl p-8 text-center shadow-lg border border-green-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-green-500 to-green-600 opacity-0 group-hover:opacity-100 transition"></div>
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-green-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900 mb-3">Cuentas de Ahorro</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Planes flexibles con tasas competitivas, diseñados para que tus ahorros crezcan de forma segura y constante.
                    </p>
                    <a href="#" class="inline-block mt-6 text-green-600 font-semibold hover:text-green-700 transition">
                        Saber más →
                    </a>
                </div>

                <!-- Préstamos -->
                <div class="group relative bg-white rounded-2xl p-8 text-center shadow-lg border border-blue-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition"></div>
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900 mb-3">Préstamos Personales</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Créditos accesibles con tasas preferenciales, aprobación rápida y condiciones transparentes para tus proyectos.
                    </p>
                    <a href="{{ route('creditos.index') }}" class="inline-block mt-6 text-green-600 font-semibold hover:text-green-700 transition">
                        Ver planes →
                    </a>
                </div>

                <!-- Apoyo Comunitario -->
                <div class="group relative bg-white rounded-2xl p-8 text-center shadow-lg border border-purple-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 to-purple-600 opacity-0 group-hover:opacity-100 transition"></div>
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-purple-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900 mb-3">Apoyo Comunitario</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Invertimos en proyectos sociales, educación financiera y desarrollo sostenible para nuestras comunidades.
                    </p>
                    <a href="/nosotros" class="inline-block mt-6 text-green-600 font-semibold hover:text-green-700 transition">
                        Proyectos →
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection