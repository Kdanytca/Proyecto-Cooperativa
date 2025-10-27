<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Credito;
use App\Models\Cuota;

class DashboardController extends Controller
{
    public function index()
    {
        // Totales de usuarios
        $totalUsuarios   = User::count();
        $totalAdmins     = User::where('tipo_usuario', 'administrador')->count();
        $totalEmpleados  = User::where('tipo_usuario', 'empleado')->count();
        $totalClientes   = User::where('tipo_usuario', 'cliente')->count();

        // ✅ Aquí estaba la variable faltante
        $pendientes = Credito::where('estado', 'pendiente')->count();

        // Créditos
        $totalSolicitudes = Credito::count();
        $creditosActivos  = Credito::where('estado', 'aprobado')->count();
        $pagosAtrasados   = Cuota::where('estado', 'atrasada')->count();

        // Últimas solicitudes (tabla al final)
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
            'pagosAtrasados',
            'ultimasSolicitudes',
            'pendientes'
        ));
    }
}
