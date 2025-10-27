<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $plan
 * @property string $monto
 * @property int $plazo_meses
 * @property string $interes
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $fecha_aprobacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cuota> $cuotas
 * @property-read int|null $cuotas_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito whereFechaAprobacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito whereInteres($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito wherePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito wherePlazoMeses($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credito whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCredito {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $credito_id
 * @property int $numero_cuota
 * @property string $monto
 * @property \Illuminate\Support\Carbon $fecha_vencimiento
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Credito $credito
 * @property-read mixed $estado_label
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota pendientes()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota vencidas()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota whereCreditoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota whereFechaVencimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota whereNumeroCuota($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuota whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCuota {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $tipo_usuario
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Credito[] $creditos
 * @method \Illuminate\Database\Eloquent\Relations\HasMany creditos()
 * @property string|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $creditos_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTipoUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

