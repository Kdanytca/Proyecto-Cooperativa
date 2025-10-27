<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Credito;

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
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_usuario',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relación: un usuario puede tener muchos créditos
     */
    public function creditos()
    {
        return $this->hasMany(Credito::class);
    }
    public function perfilCrediticio()
    {
        return $this->hasOne(PerfilCrediticio::class);
    }
}
