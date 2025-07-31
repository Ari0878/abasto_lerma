<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Clase anónima que representa la migración
return new class extends Migration
{
    /**
     * Ejecuta la migración: crea la tabla 'visitas'
     */
    public function up(): void
    {
        Schema::create('visitas', function (Blueprint $table) {
            // Clave primaria autoincremental
            $table->id();

            // Fecha de la visita
            $table->date('fecha');

            // Nombre completo del visitante
            $table->string('nombre_completo');

            // Motivo o asunto de la visita
            $table->string('asunto');

            // Localidad de origen del visitante
            $table->string('localidad');

            // Teléfono de contacto del visitante
            $table->string('telefono');

            // Campos 'created_at' y 'updated_at'
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración: elimina la tabla 'visitas'
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
