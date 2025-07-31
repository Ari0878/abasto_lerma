<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Clase anónima para definir la migración
return new class extends Migration
{
    /**
     * Ejecuta la migración: crea la tabla 'ingresos'
     */
    public function up(): void
    {
        Schema::create('ingresos', function (Blueprint $table) {
            // Clave primaria autoincremental
            $table->id();

            // Mes del ingreso (1-12)
            $table->tinyInteger('mes');

            // Año del ingreso (ej. 2024)
            $table->integer('año');

            // Monto del ingreso con 2 decimales, ejemplo: 1500.50
            $table->decimal('cantidad', 10, 2);

            // Timestamps: created_at y updated_at
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración: elimina la tabla 'ingresos'
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos'); // ← corrección aquí
    }
};
