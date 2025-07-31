<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada (singular, en vez del plural 'roles')
    protected $table = 'role';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'role', // Nombre del rol, por ejemplo: 'administrador', 'usuario', etc.
    ];
}
