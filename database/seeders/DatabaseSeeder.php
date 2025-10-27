<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@correo.com'], // criterio de búsqueda
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin1234'), 
                'tipo_usuario' => 'administrador',
                'email_verified_at' => now(),
            ]
        );
    }
}
