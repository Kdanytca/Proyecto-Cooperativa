<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Credito;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function generar()
    {
        $user = Auth::user();

        // Cargamos los créditos junto con sus cuotas
        $creditos = Credito::with('cuotas')->where('user_id', $user->id)->get();

        // Totales básicos
        $totalSolicitudes = $creditos->count();
        $totalPendientes = $creditos->where('estado', 'pendiente')->count();
        $totalAprobados = $creditos->where('estado', 'aprobado')->count();
        $totalRechazados = $creditos->where('estado', 'rechazado')->count();

        // Calcular monto pendiente real sumando las cuotas no pagadas
        $totalAdeudado = 0;

        foreach ($creditos->where('estado', 'aprobado') as $credito) {
            $montoPendiente = $credito->cuotas->where('estado', 'pendiente')->sum('monto');
            $totalAdeudado += $montoPendiente;

            // Agregar propiedad temporal para mostrar en el PDF
            $credito->monto_pendiente = $montoPendiente;
        }

        // Generar el PDF
        $pdf = Pdf::loadView('cliente.reportes.creditos', compact(
            'user',
            'creditos',
            'totalSolicitudes',
            'totalPendientes',
            'totalAprobados',
            'totalRechazados',
            'totalAdeudado'
        ))->setPaper('a4', 'portrait');

        return $pdf->download('mi_reporte_creditos.pdf');
    }
}
