<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $table ='expediente';
    protected $primaryKey ='id';
    protected $fillable = [    
    'folio',
    'ap',
    'am',
    'nombre',
    'localizacion',
    'giro',
    'estado',
    'archivo',
    'tipo_expe',
    'region_id',
    ];

    public function region()
{
    return $this->belongsTo(Region::class);
}
}
