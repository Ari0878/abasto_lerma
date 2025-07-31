<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada (singular, porque no es el plural 'regions')
    protected $table = 'region';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'numero_region', // Número o código identificador de la región
        'nombre',        // Nombre de la región
    ];
}
