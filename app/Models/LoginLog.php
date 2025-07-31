<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'user_id',      // ID del usuario que hizo login
        'ip_address',   // Dirección IP desde la que se conectó
        'user_agent',   // Información del agente de usuario (navegador y SO)
        'device',       // Dispositivo usado (opcional)
        'platform',     // Plataforma del sistema operativo (opcional)
        'browser',      // Navegador usado (opcional)
    ];    

    /**
     * Relación: un login log pertenece a un usuario
     */
    public function user()
    {
        // Relación belongsTo hacia el modelo Usuario, usando la clave foránea 'user_id'
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
