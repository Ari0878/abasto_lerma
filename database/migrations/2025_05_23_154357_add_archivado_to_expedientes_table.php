<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Clase anónima que extiende Migration
return new class extends Migration
{
    /**
     * Ejecuta la migración (agrega la columna 'archivado' a la tabla 'expediente')
     */
    public function up(): void
    {
        Schema::table('expediente', function (Blueprint $table) {
            // Agrega una columna booleana llamada 'archivado' con valor por defecto en false
            $table->boolean('archivado')->default(false);
        });
    }

    /**
     * Revierte la migración (elimina la columna 'archivado')
     */
    public function down(): void
    {
        Schema::table('expediente', function (Blueprint $table) {
            // Elimina la columna 'archivado' si existe
            $table->dropColumn('archivado');
        });
    }
};
