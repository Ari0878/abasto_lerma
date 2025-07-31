<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NoCache
{
    // Este middleware evita que las respuestas se almacenen en caché por el navegador
    public function handle(Request $request, Closure $next)
    {
        // Procesa la solicitud y obtiene la respuesta
        $response = $next($request);

        // Verifica si la respuesta tiene encabezados (para asegurarse de que se pueden modificar)
        if (method_exists($response, 'headers')) {
            // Evita el almacenamiento en caché configurando los encabezados HTTP apropiados
            $response->headers->set('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
            $response->headers->set('Pragma', 'no-cache'); // Para compatibilidad con HTTP/1.0
            $response->headers->set('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT'); // Fecha pasada para indicar expiración
        }

        // Retorna la respuesta modificada
        return $response;
    }
}
