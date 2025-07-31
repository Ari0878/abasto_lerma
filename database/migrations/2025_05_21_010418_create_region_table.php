<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Retorna una clase anónima que extiende la clase Migration
return new class extends Migration
{
    /**
     * Ejecuta la migración (crea la tabla 'region')
     */
    public function up(): void
    {
        Schema::create('region', function (Blueprint $table) {
            // Crea una columna 'id' autoincremental como clave primaria
            $table->id();
            
            // Crea una columna tipo string para almacenar el número de la región
            $table->string('numero_region');
            
            // Crea una columna tipo string para almacenar el nombre de la región
            $table->string('nombre');
            
            // Agrega las columnas 'created_at' y 'updated_at' automáticamente
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración (elimina la tabla 'region' si existe)
     */
    public function down(): void
    {
        Schema::dropIfExists('region');
    }
};
