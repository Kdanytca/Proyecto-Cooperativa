<!-- NAVBAR -->
<nav class="bg-green-900 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 3a7 7 0 110 14 7 7 0 010-14z" />
                <path d="M12 7v5l3 2" />
            </svg>
            <span class="font-bold text-lg text-white">Cooperativa</span>
        </div>

        <!-- Links SIEMPRE visibles -->
        <div class="space-x-6 flex">
            <a href="{{ route('home') }}" class="flex items-center gap-1 text-white hover:text-yellow-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 20V10H0L10 0l10 10h-10v10z" />
                </svg>
                Inicio
            </a>
            <a href="{{ route('creditos.index') }}" class="flex items-center gap-1 text-white hover:text-yellow-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 6h16v2H2V6zm0 6h16v2H2v-2z" />
                </svg>
                Créditos
            </a>

            <a href="/nosotros" class="flex items-center gap-1 text-white hover:text-yellow-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 10a4 4 0 110-8 4 4 0 010 8zm-6 8a6 6 0 1112 0H4z" />
                </svg>
                Nosotros
            </a>
            <a href="/contacto" class="flex items-center gap-1 text-white hover:text-yellow-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M2.94 6.34a8 8 0 0010.72 10.72l2.83-2.83a1 1 0 000-1.41l-2.12-2.12a1 1 0 00-1.41 0l-1.06 1.06a5 5 0 01-6.36-6.36l1.06-1.06a1 1 0 000-1.41L4.35 3.5a1 1 0 00-1.41 0L2.94 4.91z" />
                </svg>
                Contacto
            </a>
        </div>

        <!-- Login/Register -->
        <div>
            @if (Route::has('login'))
                <div class="flex items-center space-x-3">
                    @auth
                        <a href="{{ route(Auth::user()->tipo_usuario . '.dashboard') }}"
                            class="bg-yellow-400 text-blue-900 px-3 py-1 rounded-lg font-semibold hover:bg-yellow-300">
                            {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->tipo_usuario) }})
                        </a>

                        <!-- Notificaciones -->
                        @if (Auth::check())
                            <div class="relative">
                                <button id="notifButton" class="relative text-white hover:text-yellow-300">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2a7 7 0 00-7 7v5H4l1 1h14l1-1h-1V9a7 7 0 00-7-7zm0 20a3 3 0 003-3H9a3 3 0 003 3z" />
                                    </svg>

                                    @if (Auth::user()->tipo_usuario !== 'cliente')
                                        @php
                                            $pendientes = \App\Models\Credito::where('estado', 'pendiente')->count();
                                        @endphp
                                        @if ($pendientes > 0)
                                            <span
                                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">
                                                {{ $pendientes }}
                                            </span>
                                        @endif
                                    @else
                                        @php
                                            $notificaciones = \App\Models\Credito::where('user_id', Auth::id())
                                                ->whereIn('estado', ['aprobado', 'rechazado'])
                                                ->latest()
                                                ->take(5)
                                                ->get();
                                        @endphp
                                        @if ($notificaciones->count() > 0)
                                            <span
                                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">
                                                {{ $notificaciones->count() }}
                                            </span>
                                        @endif
                                    @endif
                                </button>

                                <!-- Dropdown de notificaciones -->
                                <div id="notifDropdown"
                                    class="hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg p-4">
                                    <h4 class="font-bold text-green-900 mb-2">🔔 Notificaciones</h4>
                                    <ul class="space-y-2 text-sm text-gray-700">
                                        @if (Auth::user()->tipo_usuario !== 'cliente')
                                            @if ($pendientes > 0)
                                                <li>⏳ Tienes {{ $pendientes }} solicitud(es) pendiente(s) por aprobar</li>
                                            @else
                                                <li>✔️ No hay solicitudes nuevas</li>
                                            @endif
                                            <div class="mt-3 text-center">
                                                <a href="{{ route('administrador.creditos.index') }}"
                                                    class="text-blue-600 hover:underline text-sm">
                                                    Ir a gestión de créditos
                                                </a>
                                            </div>
                                        @else
                                            @forelse ($notificaciones as $notif)
                                                <li>
                                                    @if ($notif->estado === 'aprobado')
                                                        ✔️ Tu crédito ha sido aprobado
                                                    @else
                                                        ❌ Tu crédito fue rechazado
                                                    @endif
                                                </li>
                                            @empty
                                                <li>📭 No tienes notificaciones</li>
                                            @endforelse
                                            <div class="mt-3 text-center">
                                                <a href="{{ route('cliente.creditos.index') }}"
                                                    class="text-blue-600 hover:underline text-sm">
                                                    Ver mis créditos
                                                </a>
                                            </div>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <script>
                                const notifButton = document.getElementById('notifButton');
                                const notifDropdown = document.getElementById('notifDropdown');
                                notifButton.addEventListener('click', () => {
                                    notifDropdown.classList.toggle('hidden');
                                });
                            </script>
                        @endif

                        <!-- Botón Cerrar sesión -->
                        <form method="POST" action="{{ route('logout') }}"
                            onsubmit="return confirm('¿Seguro que deseas cerrar sesión?');">
                            @csrf
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-red-500">
                                Cerrar sesión
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:underline">
                            Iniciar sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="bg-yellow-400 text-green-900 px-3 py-1 rounded-lg font-semibold hover:bg-yellow-300">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
