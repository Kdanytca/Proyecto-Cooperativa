<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfiles_crediticios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('creditos_totales')->default(0);
            $table->integer('creditos_pagados')->default(0);
            $table->integer('creditos_activos')->default(0);
            $table->decimal('monto_total_creditos', 12, 2)->default(0);
            $table->decimal('monto_total_pagado', 12, 2)->default(0);
            $table->decimal('monto_pendiente', 12, 2)->default(0);
            $table->decimal('calificacion', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfiles_crediticios');
    }
};
