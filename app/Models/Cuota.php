<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCuota
 */
class Cuota extends Model
{
    use HasFactory;

    protected $fillable = [
        'credito_id',
        'numero_cuota',
        'monto',
        'fecha_vencimiento',
        'estado',
        'fecha_pago',  // ✅ AGREGAR ESTO
    ];

    protected $casts = [
        'fecha_vencimiento' => 'date',
        'fecha_pago' => 'datetime', // ✅ opcional pero recomendado
    ];

    public function credito()
    {
        return $this->belongsTo(Credito::class);
    }

    public function getEstadoLabelAttribute()
    {
        return match ($this->estado) {
            'pendiente' => '⏳ Pendiente',
            'pagada'    => '✔️ Pagada',
            'vencida'   => '❌ Vencida',
            default     => ucfirst($this->estado),
        };
    }

    public function scopePendientes($query)
    {
        return $query->where('estado', 'pendiente');
    }

    public function scopeVencidas($query)
    {
        return $query->where('estado', 'vencida');
    }
}
