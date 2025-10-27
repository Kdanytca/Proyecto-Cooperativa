@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
    <div class="py-12 bg-green-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <!-- Título -->
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-green-900">📬 Contáctanos</h1>
                <p class="text-green-700 mt-2">Estamos aquí para ayudarte en lo que necesites</p>
            </div>

            <!-- Contenido -->
            <div class="grid md:grid-cols-2 gap-10">

                <!-- Información y formulario -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-semibold text-green-800 mb-4">Envíanos un mensaje</h3>

                    <form action="#" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-green-700 mb-1">Nombre</label>
                            <input type="text"
                                class="w-full border rounded-lg px-3 py-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-green-700 mb-1">Correo</label>
                            <input type="email"
                                class="w-full border rounded-lg px-3 py-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-green-700 mb-1">Mensaje</label>
                            <textarea rows="4" class="w-full border rounded-lg px-3 py-2 focus:ring-green-500 focus:border-green-500"></textarea>
                        </div>

                        <button type="submit"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Enviar
                        </button>
                    </form>

                    <div class="mt-8">
                        <h4 class="text-lg font-semibold text-green-800 mb-2">Información de contacto</h4>
                        <ul class="text-gray-700 space-y-1">
                            <li><strong>Teléfono:</strong> +503 2222-3333</li>
                            <li><strong>Correo:</strong> contacto@cooperativaprogreso.com</li>
                            <li><strong>Horario:</strong> Lunes a Viernes, 8:00 AM - 5:00 PM</li>
                            <li><strong>Dirección:</strong> Zacatecoluca, El Salvador</li>
                        </ul>
                    </div>
                </div>

                <!-- Mapa -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-semibold text-green-800 mb-4">Ubicación</h3>
                    <iframe src="https://www.google.com/maps?q=F4WM+H7P,+Zacatecoluca&output=embed"
                        class="w-full h-96 rounded-lg border-2 border-green-200 shadow">
                    </iframe>
                </div>

            </div>
        </div>
    </div>
@endsection
