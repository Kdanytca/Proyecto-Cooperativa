<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('perfiles_crediticios', function (Blueprint $table) {
            $table->string('trabajo')->nullable()->after('user_id');
            $table->decimal('salario', 10, 2)->nullable()->after('trabajo');
            $table->string('telefono', 20)->nullable()->after('salario');
        });
    }

    public function down(): void
    {
        Schema::table('perfiles_crediticios', function (Blueprint $table) {
            $table->dropColumn(['trabajo', 'salario', 'telefono', 'tiene_reporte', 'mora']);
        });
    }
};
