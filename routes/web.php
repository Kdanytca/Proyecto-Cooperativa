<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\Admin\ReporteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ========================
// PÁGINA PRINCIPAL (Landing)
// ========================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ========================
// RUTAS AUTENTICADAS
// ========================
Route::middleware(['auth'])->group(function () {

    // Perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ========================
    // ADMINISTRADOR
    // ========================
    Route::prefix('administrador')->name('administrador.')->group(function () {
        // Dashboard (con parche de seguridad en el controlador)
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Gestión de usuarios
        Route::resource('/users', UserController::class)->names('users');
        
        // Gestión de clientes
        Route::resource('/clients', ClientController::class)->names('clients');
        
        // Gestión de créditos
        Route::get('/creditos', [CreditoController::class, 'index'])->name('creditos.index');
        Route::get('/creditos/{credito}', [CreditoController::class, 'show'])->name('creditos.show');
        Route::patch('/creditos/{credito}', [CreditoController::class, 'updateEstado'])->name('creditos.update');
        
        // Reportes
        Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
        Route::post('/reportes/generar', [ReporteController::class, 'generar'])->name('reportes.generar');
        Route::post('/reportes/clientes', [ReporteController::class, 'clientes'])->name('reportes.clientes');
    });

    // ========================
    // EMPLEADO
    // ========================
    Route::prefix('empleado')->name('empleado.')->group(function () {
        // Mismo dashboard del admin (con parche de seguridad)
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });

    // ========================
    // CLIENTE
    // ========================
    Route::prefix('cliente')->name('cliente.')->group(function () {
        // Dashboard exclusivo para clientes
        Route::get('/dashboard', function () {
            $user = Auth::user();
            $creditoActivo = $user->creditos()
                ->whereIn('estado', ['aprobado', 'liquidado'])
                ->with('cuotas')
                ->latest()
                ->first();

            $saldoPendiente = 0;
            $proximoPago = null;
            $pagosRealizados = 0;
            $ultimosPagos = collect();

            if ($creditoActivo) {
                $saldoPendiente = $creditoActivo->cuotas()
                    ->where('estado', 'pendiente')
                    ->sum('monto');

                $proximoPago = $creditoActivo->cuotas()
                    ->where('estado', 'pendiente')
                    ->orderBy('fecha_vencimiento', 'asc')
                    ->first();

                $pagosRealizados = $creditoActivo->cuotas()
                    ->where('estado', 'pagada')
                    ->count();

                $ultimosPagos = $creditoActivo->cuotas()
                    ->where('estado', 'pagada')
                    ->latest()
                    ->take(5)
                    ->get();
            }

            return view('cliente.dashboard', compact(
                'creditoActivo',
                'saldoPendiente',
                'proximoPago',
                'pagosRealizados',
                'ultimosPagos'
            ));
        })->name('dashboard');

        // Mis créditos
        Route::get('/creditos', [CreditoController::class, 'misCreditos'])->name('creditos.index');
        Route::post('/creditos', [CreditoController::class, 'store'])->name('creditos.store');
        
        // Detalle de crédito
        Route::get('/creditos/{credito}', [CreditoController::class, 'showCliente'])->name('creditos.show');
        
        // Pago de cuota
        Route::post('/cuotas/{cuota}/pagar', [CreditoController::class, 'pagarCuota'])
            ->name('cuotas.pagar');
        
        // Reporte personal
        Route::get('/reporte', [App\Http\Controllers\Cliente\ReporteController::class, 'generar'])
            ->name('reporte.generar');
    });
});

// ========================
// CRÉDITOS (acceso público)
// ========================
Route::get('/creditos', function () {
    return view('creditos');
})->name('creditos.index');

// Solicitud de crédito (solo autenticados)
Route::post('/creditos', [CreditoController::class, 'store'])->name('prestamos.store');

// Gestión de créditos
Route::get('/creditos/gestion', [CreditoController::class, 'gestion'])->name('creditos.gestion');
Route::get('/creditos/{credito}', [CreditoController::class, 'show'])->name('creditos.show');

// ========================
// PÁGINAS PÚBLICAS
// ========================
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// ========================
// AUTENTICACIÓN
// ========================
require __DIR__ . '/auth.php';