<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilCrediticio extends Model
{
    protected $table = 'perfiles_crediticios';

    protected $fillable = [
        'user_id',
        'trabajo',         
        'salario',              
        'telefono',
        'creditos_totales',
        'creditos_pagados',
        'creditos_activos',
        'monto_total_creditos',
        'monto_total_pagado',
        'monto_pendiente',
        'calificacion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
