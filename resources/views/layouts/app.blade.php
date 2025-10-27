<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Cooperativa El Progreso')</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-green-50 text-gray-700 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    @include('partials.navbar')

    <!-- CONTENIDO -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-green-800 text-green-100 py-8">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} Cooperativa El Progreso. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>
