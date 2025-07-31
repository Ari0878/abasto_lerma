<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Retorna una clase anónima que extiende la clase Migration
return new class extends Migration
{
    /**
     * Ejecuta la migración (crea la tabla 'expediente')
     */
    public function up(): void
    {
        Schema::create('expediente', function (Blueprint $table) {
            // Columna 'id' como clave primaria autoincremental
            $table->id();

            // Columna para el folio del expediente
            $table->string('folio');

            // Columnas para apellidos y nombre
            $table->string('ap');         // Apellido paterno
            $table->string('am');         // Apellido materno
            $table->string('nombre');     // Nombre(s)

            // Columna para la localización del expediente
            $table->string('localizacion');

            // Columna para el giro (tipo de actividad o negocio)
            $table->string('giro');

            // Columna de tipo texto para almacenar el archivo (ruta o contenido)
            $table->text('archivo');

            // Tipo de expediente
            $table->string('tipo_expe');

            // Estado actual del expediente
            $table->string('estado');

            // Clave foránea que apunta a la tabla 'region'
            $table->unsignedBigInteger('region_id');

            // Timestamps 'created_at' y 'updated_at'
            $table->timestamps();

            // Define la relación foránea con la tabla 'region'
            $table->foreign('region_id')
                  ->references('id')
                  ->on('region')
                  ->onDelete('cascade'); // Elimina expedientes relacionados si se elimina una región
        });
    }

    /**
     * Revierte la migración (elimina la tabla 'expediente')
     */
    public function down(): void
    {
        Schema::dropIfExists('expediente');
    }
};
