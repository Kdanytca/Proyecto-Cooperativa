<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCredito
 */
class Credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan',
        'monto',
        'plazo_meses',
        'interes',
        'estado',
        'fecha_aprobacion', // 👈 lo agregamos
    ];

    // 👇 convierte automáticamente en Carbon las fechas
    protected $casts = [
        'created_at'       => 'datetime',
        'updated_at'       => 'datetime',
        'fecha_aprobacion' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }

}
