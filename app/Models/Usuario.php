<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    // Nombre de la tabla asociada
    protected $table = 'usuarios';

    // Campos que pueden asignarse masivamente
    protected $fillable = ['name', 'email', 'password', 'role'];

    // Campos que deben ocultarse al convertir el modelo a array o JSON
    protected $hidden = ['password', 'remember_token'];

    /**
     * Método para verificar si el usuario es administrador
     * 
     * @return bool
     */
    public function isAdmin()
    {
        // Compara el rol en minúsculas para evitar problemas de mayúsculas/minúsculas
        return strtolower($this->role) === 'administrador';
    }
}
