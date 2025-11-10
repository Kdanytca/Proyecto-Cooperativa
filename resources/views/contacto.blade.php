@extends('layouts.app')

@section('title', 'Contacto - Cooperativa El Progreso')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-green-50 to-white">

        <!-- Hero con formulario integrado -->
        <section class="relative overflow-hidden bg-gradient-to-br from-green-900 to-green-700 py-20">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
                
                <!-- Texto destacado -->
                <div class="text-white">
                    <div class="flex items-center mb-6">
                        <svg class="w-8 h-8 text-yellow-300 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span class="text-yellow-300 font-semibold">RESPUESTA EN 24 HORAS</span>
                    </div>
                    <h1 class="text-5xl font-extrabold mb-6">¿En qué podemos ayudarte?</h1>
                    <p class="text-xl text-green-100 leading-relaxed mb-8">
                        Nuestro equipo está listo para responder tus preguntas sobre créditos, ahorros y servicios comunitarios.
                    </p>
                    
                    <!-- Stats rápidas -->
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">95%</div>
                            <div class="text-sm text-green-200">Satisfacción</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">24h</div>
                            <div class="text-sm text-green-200">Respuesta</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">350+</div>
                            <div class="text-sm text-green-200">Asesorados</div>
                        </div>
                    </div>
                </div>

                <!-- Formulario en hero -->
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20">
                    <h3 class="text-2xl font-bold text-white mb-6">Envía tu consulta</h3>
                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="relative">
                            <input type="text" id="nombre" class="w-full bg-white/10 border border-white/30 rounded-xl px-4 py-3 text-white placeholder-white/60 focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition" placeholder=" ">
                            <label for="nombre" class="absolute left-4 top-3 text-white/60 transition-all peer-focus:text-yellow-300 peer-focus:text-xs peer-focus:-top-2 peer-focus:bg-green-800 px-1 rounded">Tu nombre completo</label>
                        </div>
                        
                        <div class="relative">
                            <input type="email" id="email" class="w-full bg-white/10 border border-white/30 rounded-xl px-4 py-3 text-white placeholder-white/60 focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition" placeholder=" ">
                            <label for="email" class="absolute left-4 top-3 text-white/60 transition-all peer-focus:text-yellow-300 peer-focus:text-xs peer-focus:-top-2 peer-focus:bg-green-800 px-1 rounded">Correo electrónico</label>
                        </div>
                        
                        <div class="relative">
                            <select id="asunto" class="w-full bg-white/10 border border-white/30 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition">
                                <option value="" class="text-gray-800">Selecciona un asunto</option>
                                <option value="credito" class="text-gray-800">Consulta sobre créditos</option>
                                <option value="ahorro" class="text-gray-800">Información de ahorros</option>
                                <option value="soporte" class="text-gray-800">Soporte técnico</option>
                                <option value="otro" class="text-gray-800">Otro</option>
                            </select>
                        </div>
                        
                        <div class="relative">
                            <textarea id="mensaje" rows="4" class="w-full bg-white/10 border border-white/30 rounded-xl px-4 py-3 text-white placeholder-white/60 focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition resize-none" placeholder=" "></textarea>
                            <label for="mensaje" class="absolute left-4 top-3 text-white/60 transition-all peer-focus:text-yellow-300 peer-focus:text-xs peer-focus:-top-2 peer-focus:bg-green-800 px-1 rounded">Escribe tu mensaje</label>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 to-yellow-500 text-green-900 font-bold py-4 rounded-xl hover:from-yellow-500 hover:to-yellow-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                </svg>
                                Enviar Mensaje
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Información de contacto premium -->
        <section class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6">
                <div class="grid md:grid-cols-4 gap-8">
                    <!-- Tarjeta Teléfono -->
                    <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border border-green-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-2xl flex items-center justify-center group-hover:bg-green-200 transition">
                            <svg class="w-8 h-8 text-green-700" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Llámanos</h3>
                        <p class="text-gray-600 mb-1">Lun-Vie 8AM-5PM</p>
                        <a href="tel:+50312345678" class="text-lg font-semibold text-green-600 hover:text-green-700 transition">+503 1234 5678</a>
                    </div>

                    <!-- Tarjeta Email -->
                    <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border border-blue-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition">
                            <svg class="w-8 h-8 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Escríbenos</h3>
                        <p class="text-gray-600 mb-1">Respondemos en 24h</p>
                        <a href="mailto:info@cooperativa.pro" class="text-lg font-semibold text-blue-600 hover:text-blue-700 transition">info@cooperativa.pro</a>
                    </div>

                    <!-- Tarjeta WhatsApp -->
                    <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border border-green-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-2xl flex items-center justify-center group-hover:bg-green-200 transition">
                            <svg class="w-8 h-8 text-green-700" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">WhatsApp</h3>
                        <p class="text-gray-600 mb-1">Respuesta inmediata</p>
                        <a href="https://wa.me/50312345678" target="_blank" class="text-lg font-semibold text-green-600 hover:text-green-700 transition">+503 1234 5678</a>
                    </div>

                    <!-- Tarjeta Dirección -->
                    <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border border-purple-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 mx-auto mb-4 bg-purple-100 rounded-2xl flex items-center justify-center group-hover:bg-purple-200 transition">
                            <svg class="w-8 h-8 text-purple-700" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Visítanos</h3>
                        <p class="text-gray-600 mb-1">ITCA-FEPADE</p>
                        <address class="text-lg font-semibold text-purple-600 not-italic">Zacatecoluca, LA PAZ</address>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mapa estilizado -->
        <section class="py-16 bg-green-50">
            <div class="max-w-6xl mx-auto px-6">
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <div class="p-8 border-b border-gray-200">
                        <h3 class="text-2xl font-bold text-green-900 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                            </svg>
                            Nuestra Ubicación
                        </h3>
                        <p class="text-gray-600 mt-2">Encuéntranos en el corazón de Zacatecoluca</p>
                    </div>
                    <div class="relative">
                        <iframe src="https://www.google.com/maps?q=F4WM+H7P,+Zacatecoluca&output=embed"
                            class="w-full h-96 border-0"></iframe>
                        <div class="absolute top-4 right-4 bg-white p-4 rounded-lg shadow-lg">
                            <div class="flex items-center mb-2">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                                </svg>
                                <span class="text-sm font-semibold text-gray-800">Horario</span>
                            </div>
                            <div class="text-sm text-gray-600">Lun-Vie: 8:00 AM - 5:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ simple -->
        <section class="py-16 bg-white">
            <div class="max-w-4xl mx-auto px-6">
                <h3 class="text-3xl font-bold text-green-900 text-center mb-12">Preguntas Frecuentes</h3>
                <div class="space-y-6">
                    @foreach([
                        ['q' => '¿Qué requisitos necesito para un crédito?', 'a' => 'Necesitas ser mayor de edad, contar con ingresos verificables y tener un buen historial crediticio.'],
                        ['q' => '¿Cuánto tiempo tarda la aprobación?', 'a' => 'El proceso de evaluación toma entre 24 y 48 horas hábiles.'],
                        ['q' => '¿Puedo pagar mi crédito antes de tiempo?', 'a' => 'Sí, puedes realizar pagos anticipados sin penalización.']
                    ] as $faq)
                    <div x-data="{ open: false }" class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-green-50 transition">
                            <span class="font-semibold text-green-900">{{ $faq['q'] }}</span>
                            <svg class="w-5 h-5 text-green-600 transform transition" :class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="px-6 py-4 bg-green-50 text-gray-700">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush