<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Maneja la verificación de roles del usuario.
     * 
     * @param Request $request La solicitud entrante.
     * @param Closure $next La siguiente acción que se ejecutará si pasa el middleware.
     * @param mixed ...$roles Lista de roles permitidos.
     * 
     * @return Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Verifica que el usuario esté autenticado y tenga un rol permitido
        if (auth()->check() && in_array(auth()->user()->role, $roles)) {
            return $next($request); // Continúa con la solicitud si tiene el rol permitido
        }

        // Si no tiene el rol adecuado, devuelve error 403 (Prohibido)
        abort(403, 'Acceso no autorizado');
    }
}
