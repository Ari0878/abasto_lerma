<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;
use App\Models\LoginLog;

class LogSuccessfulLogin
{
    /**
     * Maneja el evento de inicio de sesión exitoso.
     *
     * @param Login $event El evento de inicio de sesión (contiene al usuario autenticado)
     */
    public function handle(Login $event)
    {
        $agent = new Agent(); // Instancia para detectar el navegador, plataforma y dispositivo

        // Registra el inicio de sesión en la tabla login_logs
        LoginLog::create([
            'user_id' => $event->user->id, // ID del usuario autenticado
            'ip_address' => Request::ip(), // Dirección IP del usuario
            'user_agent' => Request::header('User-Agent'), // Cadena completa del navegador
            'device' => $agent->device(), // Nombre del dispositivo (si se puede detectar)
            'platform' => $agent->platform() . ' ' . $agent->version($agent->platform()), // Sistema operativo con versión
            'browser' => $agent->browser() . ' ' . $agent->version($agent->browser()), // Navegador con versión
        ]);
    }
}
