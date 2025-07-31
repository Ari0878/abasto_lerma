<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    // Campos que pueden asignarse de forma masiva
    protected $fillable = [
        'fecha',            // Fecha de la visita
        'nombre_completo',  // Nombre completo del visitante
        'asunto',           // Motivo o asunto de la visita
        'localidad',        // Localidad del visitante
        'telefono',         // Teléfono de contacto
    ];
}
