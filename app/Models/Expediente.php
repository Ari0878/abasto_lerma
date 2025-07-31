<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    // Nombre de la tabla (en caso de no seguir la convención pluralizada)
    protected $table = 'expediente';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos que pueden ser asignados de forma masiva
    protected $fillable = [    
        'folio',
        'ap',             // Apellido paterno
        'am',             // Apellido materno
        'nombre',
        'localizacion',
        'giro',
        'estado',
        'archivo',
        'tipo_expe',
        'region_id',
    ];

    /**
     * Relación: un expediente pertenece a una región
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
