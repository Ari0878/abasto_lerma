<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Clase anónima para definir la migración
return new class extends Migration {
    /**
     * Ejecuta la migración: crea la tabla 'usuarios'
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            // Clave primaria autoincremental
            $table->id();

            // Nombre del usuario
            $table->string('name');

            // Correo electrónico único
            $table->string('email')->unique();

            // Contraseña del usuario (encriptada)
            $table->string('password');

            // Rol del usuario con valor por defecto 'usuario' (puede ser 'usuario' o 'administrador')
            $table->string('role')->default('usuario');

            // Token para recordar sesión (remember me)
            $table->rememberToken();

            // Timestamps para 'created_at' y 'updated_at'
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración: elimina la tabla 'usuarios'
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
