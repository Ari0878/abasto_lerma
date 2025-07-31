<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Clase anónima que extiende Migration
return new class extends Migration
{
    /**
     * Ejecuta la migración: crea la tabla 'login_logs'
     */
    public function up(): void
    {
        Schema::create('login_logs', function (Blueprint $table) {
            // Clave primaria autoincremental
            $table->id();

            // Clave foránea que referencia al usuario que inició sesión
            $table->unsignedBigInteger('user_id');

            // Dirección IP desde la cual se inició sesión
            $table->string('ip_address');

            // Información del agente de usuario (navegador, sistema operativo, etc.)
            $table->string('user_agent');

            // Dispositivo detectado (opcional)
            $table->string('device')->nullable();

            // Plataforma del sistema operativo (opcional)
            $table->string('platform')->nullable();

            // Navegador usado (opcional)
            $table->string('browser')->nullable();

            // Timestamps: created_at y updated_at
            $table->timestamps();

            // Define la relación con la tabla 'usuarios'
            $table->foreign('user_id')
                  ->references('id')
                  ->on('usuarios')  // Asegúrate de que esta tabla existe
                  ->onDelete('cascade'); // Si se elimina el usuario, también se eliminan sus logs
        });
    }

    /**
     * Revierte la migración: elimina la tabla 'login_logs'
     */
    public function down(): void
    {
        Schema::dropIfExists('login_logs');
    }
};
