<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Retorna una clase anónima que extiende la clase Migration
return new class extends Migration
{
    /**
     * Ejecuta la migración (crea la tabla 'role')
     */
    public function up(): void
    {
        Schema::create('role', function (Blueprint $table) {
            // Crea una columna 'id' autoincremental como clave primaria
            $table->id();
            
            // Crea una columna tipo string para almacenar el nombre del rol
            $table->string('role');
            
            // Agrega las columnas 'created_at' y 'updated_at' automáticamente
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración (elimina la tabla 'role' si existe)
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
