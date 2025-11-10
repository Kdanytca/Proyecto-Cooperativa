<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Credito;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->tipo_usuario === 'cliente') {
            return redirect()->route('cliente.dashboard');
        }

        // Totales de usuarios
        $totalUsuarios   = User::count();
        $totalAdmins     = User::where('tipo_usuario', 'administrador')->count();
        $totalEmpleados  = User::where('tipo_usuario', 'empleado')->count();
        $totalClientes   = User::where('tipo_usuario', 'cliente')->count();

        // Créditos pendientes
        $pendientes = Credito::where('estado', 'pendiente')->count();

        // Créditos totales y activos
        $totalSolicitudes = Credito::count();
        $creditosActivos  = Credito::where('estado', 'aprobado')->count();

        // Últimas 5 solicitudes
        $ultimasSolicitudes = Credito::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'totalAdmins',
            'totalEmpleados',
            'totalClientes',
            'totalSolicitudes',
            'creditosActivos',
            'ultimasSolicitudes',
            'pendientes'
        ));
    }
}