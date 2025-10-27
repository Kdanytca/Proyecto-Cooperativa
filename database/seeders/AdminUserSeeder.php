<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // valores por defecto (se pueden cambiar en .env)
        $adminName = env('ADMIN_NAME', 'Administrador');
        $adminEmail = env('ADMIN_EMAIL', 'admin@correo.com');
        $adminPassword = env('ADMIN_PASSWORD', 'admin1234'); // NO dejar en prod

        // crear o actualizar el admin (idempotente)
        $user = User::firstOrNew(['email' => $adminEmail]);
        $user->name = $adminName;
        $user->password = Hash::make($adminPassword);
        $user->tipo_usuario = 'administrador';
        $user->email_verified_at = now();
        $user->save();
    }
}
