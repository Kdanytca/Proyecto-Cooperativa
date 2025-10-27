<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Credito;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function index()
    {
        $clientes = User::where('tipo_usuario', 'cliente')->get();
        return view('admin.reportes.index', compact('clientes'));
    }

    public function generar(Request $request)
    {
        $tipo = $request->input('tipo');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        $clienteId = $request->input('cliente_id');
        $monto = $request->input('monto');

        $query = Credito::with('user');

        // Filtrar por fechas
        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        }

        // Filtrar por cliente específico
        if ($clienteId) {
            $query->where('user_id', $clienteId);
        }

        // Filtrar por tipo (estado)
        if ($tipo !== 'todos') {
            $query->where('estado', $tipo);
        }

        // Nuevo filtro: por monto específico
        if ($monto) {
            $query->where('monto', $monto);
        }

        $creditos = $query->get();

        // Generar PDF
        $pdf = Pdf::loadView('admin.reportes.pdf', compact('creditos', 'tipo', 'fechaInicio', 'fechaFin', 'monto'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('reporte_creditos.pdf');
    }

    // =======================================================
    // 🔹 NUEVO: REPORTE DE CLIENTES COMPLETOS / INCOMPLETOS
    // =======================================================
    public function clientes(Request $request)
    {
        $estadoPerfil = $request->input('estado_perfil');

        $clientes = User::where('tipo_usuario', 'cliente')
            ->with('perfilCrediticio')
            ->get()
            ->map(function ($cliente) {
                $completo = $cliente->perfilCrediticio
                    && $cliente->perfilCrediticio->salario
                    && $cliente->perfilCrediticio->telefono;
                $cliente->perfil_completo = $completo;
                return $cliente;
            });

        // Aplicar filtro según opción seleccionada
        if ($estadoPerfil === 'completos') {
            $clientes = $clientes->where('perfil_completo', true);
        } elseif ($estadoPerfil === 'incompletos') {
            $clientes = $clientes->where('perfil_completo', false);
        }

        $pdf = Pdf::loadView('admin.reportes.clientes', compact('clientes', 'estadoPerfil'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('reporte_clientes.pdf');
    }
}
