<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\Cuota;
use App\Models\PerfilCrediticio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreditoController extends Controller
{
    // Cliente solicita un crédito
    public function store(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:Básico,Estándar,Premium',
        ]);

        $user = Auth::user();

        $planes = [
            'Básico' => ['monto' => 1000, 'plazo' => 6, 'interes' => 5],
            'Estándar' => ['monto' => 5000, 'plazo' => 12, 'interes' => 8],
            'Premium' => ['monto' => 10000, 'plazo' => 24, 'interes' => 12],
        ];

        $planSeleccionado = $planes[$request->plan];

        Credito::create([
            'user_id'      => $user->id,
            'plan'         => $request->plan,
            'monto'        => $planSeleccionado['monto'],
            'plazo_meses'  => $planSeleccionado['plazo'],
            'interes'      => $planSeleccionado['interes'],
            'estado'       => 'pendiente',
        ]);

        return redirect()->route('cliente.dashboard')
            ->with('success', 'Tu solicitud de crédito ha sido enviada y está pendiente de aprobación.');
    }

    // Panel admin/empleado
    public function index()
    {
        $creditos = Credito::with('user')->get();
        return view('admin.creditos.index', compact('creditos'));
    }

    // ✅ Actualizar estado del crédito (con validaciones)
    public function updateEstado(Request $request, Credito $credito)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,aprobado,rechazado,liquidado',
        ]);

        $user = $credito->user;
        $perfil = $user->perfilCrediticio;

        // 🚫 Si faltan datos crediticios, redirigir al formulario de edición del cliente
        if (!$perfil || !$perfil->salario || !$perfil->telefono) {
            return redirect()
                ->route('administrador.clients.edit', $user->id)
                ->with('warning', '⚠️ Debes completar los datos crediticios (salario y teléfono) antes de aprobar este crédito.');
        }

        // ✅ Validar si intenta aprobar
        if ($request->estado === 'aprobado') {
            $salarioAnual = $perfil->salario; // 🔹 Ya es anual
            $monto = (int) $credito->monto;

            $requisitos = [
                1000 => 5000,
                5000 => 12000,
                10000 => 25000,
            ];

            $requerido = $requisitos[$monto] ?? null;

            if ($requerido && $salarioAnual < $requerido) {
                return back()->with('error', "❌ Este cliente no es apto: ingreso anual (\${$salarioAnual}) menor a \${$requerido} requeridos para este crédito.");
            }
        }


        // ✅ Si todo está correcto, actualizar el estado del crédito
        $data = ['estado' => $request->estado];
        $data['fecha_aprobacion'] = $request->estado === 'aprobado' ? now() : null;
        $credito->update($data);

        // 🔁 Si se aprueba por primera vez, generar cuotas y actualizar perfil crediticio
        if ($request->estado === 'aprobado' && $credito->cuotas()->count() === 0) {
            $this->generarCuotas($credito);

            $perfil = $credito->user->perfilCrediticio()->firstOrCreate(['user_id' => $credito->user_id]);
            $perfil->increment('creditos_totales');

            $perfil->creditos_activos = Credito::where('user_id', $credito->user_id)
                ->where('estado', 'aprobado')
                ->count();

            $perfil->monto_total_creditos = Credito::where('user_id', $credito->user_id)
                ->whereIn('estado', ['aprobado', 'liquidado'])
                ->sum('monto');

            $perfil->monto_pendiente = Credito::where('user_id', $credito->user_id)
                ->where('estado', 'aprobado')
                ->sum('monto');

            $perfil->save();
        }

        return back()->with('success', '✅ Estado actualizado correctamente.');
    }



    // Generar cuotas con método francés
    private function generarCuotas(Credito $credito)
    {
        $monto = $credito->monto;
        $tasaAnual = $credito->interes / 100;
        $plazo = $credito->plazo_meses;
        $tasaMensual = $tasaAnual / 12;

        $valorCuota = $monto * ($tasaMensual * pow(1 + $tasaMensual, $plazo)) / (pow(1 + $tasaMensual, $plazo) - 1);
        $valorCuota = round($valorCuota, 2);

        $saldoPendiente = $monto;

        for ($i = 1; $i <= $plazo; $i++) {
            $interes = round($saldoPendiente * $tasaMensual, 2);
            $capital = round($valorCuota - $interes, 2);
            $saldoPendiente = round($saldoPendiente - $capital, 2);

            $credito->cuotas()->create([
                'numero_cuota'     => $i,
                'monto'            => $valorCuota,
                'interes'          => $interes,
                'capital'          => $capital,
                'saldo_restante'   => max($saldoPendiente, 0),
                'fecha_vencimiento' => now()->addMonths($i),
                'estado'           => 'pendiente',
            ]);
        }
    }

    // Panel cliente
    public function misCreditos()
    {
        $creditos = Credito::where('user_id', Auth::id())->latest()->get();
        return view('cliente.creditos.index', compact('creditos'));
    }

    // Gestión general para admin
    public function gestion()
    {
        $aprobados = Credito::where('estado', 'aprobado')->with('user')->get();
        $historial = Credito::whereIn('estado', ['rechazado', 'liquidado'])->with('user')->get();

        return view('admin.creditos.gestion', compact('aprobados', 'historial'));
    }

    public function show(Credito $credito)
    {
        $credito->load('user', 'cuotas');
        return view('admin.creditos.show', compact('credito'));
    }

    // Cliente paga una cuota
    public function pagarCuota(Cuota $cuota)
    {
        $user = Auth::user();

        if ($cuota->credito->user_id !== $user->id) {
            abort(403);
        }

        if ($cuota->estado !== 'pendiente') {
            return back()->with('error', 'No se puede pagar esta cuota (ya pagada o vencida).');
        }

        DB::transaction(function () use ($cuota) {
            $cuota->update([
                'estado' => 'pagada',
                'fecha_pago' => now(),
            ]);

            $credito = $cuota->credito;

            // Si ya no quedan cuotas pendientes, liquida el crédito
            if ($credito->cuotas()->where('estado', 'pendiente')->count() === 0) {
                $credito->update(['estado' => 'liquidado']);

                // 🔹 Actualizar perfil crediticio al liquidar
                $perfil = $credito->user->perfilCrediticio;
                if ($perfil) {
                    $perfil->creditos_pagados = Credito::where('user_id', $credito->user_id)
                        ->where('estado', 'liquidado')
                        ->count();

                    $perfil->creditos_activos = Credito::where('user_id', $credito->user_id)
                        ->where('estado', 'aprobado')
                        ->count();

                    $perfil->monto_total_pagado = Cuota::whereHas('credito', function ($q) use ($credito) {
                        $q->where('user_id', $credito->user_id);
                    })->where('estado', 'pagada')->sum('monto');

                    $perfil->monto_pendiente = Credito::where('user_id', $credito->user_id)
                        ->where('estado', 'aprobado')
                        ->sum('monto');

                    // Calificación básica según % de créditos pagados
                    $total = $perfil->creditos_totales ?: 1;
                    $perfil->calificacion = round((($perfil->creditos_pagados / $total) * 100), 2);

                    $perfil->save();
                }
            }
        });

        return back()->with('success', 'Pago registrado correctamente.');
    }

    // Mostrar detalle del crédito para cliente
    public function showCliente(Credito $credito)
    {
        if ($credito->user_id !== Auth::id()) {
            abort(403, 'No tienes acceso a este crédito.');
        }

        $credito->load('cuotas');
        return view('cliente.creditos.show', compact('credito'));
    }
}
