<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->id();

            // Relación con crédito
            $table->foreignId('credito_id')->constrained()->onDelete('cascade');

            // Datos de la cuota
            $table->integer('numero_cuota');                    // Número de cuota (1, 2, 3...)
            $table->decimal('monto', 10, 2);                    // Cuota total (capital + interés)
            $table->decimal('interes', 10, 2)->nullable();      // Parte de interés en la cuota
            $table->decimal('capital', 10, 2)->nullable();      // Parte de capital en la cuota
            $table->decimal('saldo_restante', 10, 2)->nullable(); // Saldo después de pagar esta cuota

            $table->date('fecha_vencimiento');                  // Fecha límite para pagar
            $table->timestamp('fecha_pago')->nullable();         // Fecha en que realmente se pagó

            $table->enum('estado', ['pendiente', 'pagada', 'vencida'])->default('pendiente');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuotas');
    }
};
