@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
    <!-- HERO -->
    <header class="relative bg-green-100">
        <div class="max-w-7xl mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-green-900">Bienvenido a la Cooperativa El Progreso</h1>
            <p class="mt-6 text-lg md:text-xl text-green-700">
                Unimos esfuerzos para crecer juntos. Servicios financieros, apoyo comunitario y más.
            </p>
            <div class="mt-8 space-x-4">
                <a href="{{ route('creditos.index') }}"
                    class="bg-yellow-300 text-green-900 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-200">
                    Nuestros Servicios
                </a>
                <a href="/nosotros" class="bg-green-300 text-green-900 px-6 py-3 rounded-lg font-semibold hover:bg-green-200">
                    Conócenos
                </a>
            </div>
        </div>
    </header>

    <!-- SECCIÓN SERVICIOS -->
    <section id="servicios" class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center text-green-900">Nuestros Servicios</h2>
        <div class="mt-10 grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                <div
                    class="bg-green-100 text-green-700 w-16 h-16 mx-auto flex items-center justify-center rounded-full mb-4">
                    💳
                </div>
                <h3 class="text-xl font-semibold text-green-800">Ahorros</h3>
                <p class="mt-2 text-gray-600">Planes de ahorro flexibles para toda la comunidad.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                <div
                    class="bg-green-100 text-green-700 w-16 h-16 mx-auto flex items-center justify-center rounded-full mb-4">
                    📈
                </div>
                <h3 class="text-xl font-semibold text-green-800">Préstamos</h3>
                <p class="mt-2 text-gray-600">Accede a préstamos con tasas preferenciales.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                <div
                    class="bg-green-100 text-green-700 w-16 h-16 mx-auto flex items-center justify-center rounded-full mb-4">
                    🏡
                </div>
                <h3 class="text-xl font-semibold text-green-800">Apoyo Comunitario</h3>
                <p class="mt-2 text-gray-600">Proyectos sociales y de desarrollo local.</p>
            </div>
        </div>
    </section>
@endsection
