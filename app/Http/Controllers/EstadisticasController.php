<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Expediente;

class EstadisticasController extends Controller
{
    // Método para mostrar estadísticas generales
    public function index()
    {
        // Obtener todas las regiones de la base de datos
        $regiones = Region::all();

        // Extraer los nombres de las regiones en un array simple
        $nombres_regiones = $regiones->pluck('nombre')->toArray();

        // Contar los expedientes agrupados por región
        // Resultado: array con key = region_id y value = total de expedientes
        $expedientes_por_region_raw = Expediente::selectRaw('region_id, COUNT(*) as total')
            ->groupBy('region_id')
            ->pluck('total', 'region_id')
            ->toArray();

        // Para cada región, obtener la cantidad de expedientes o 0 si no tiene
        $expedientes_por_region = $regiones->map(function($region) use ($expedientes_por_region_raw) {
            return $expedientes_por_region_raw[$region->id] ?? 0;
        })->toArray();

        // Contar el total de expedientes en la base de datos
        $total_expedientes = Expediente::count();

        // Contar cuántas regiones tienen al menos un expediente
        $regiones_activas = count(array_filter($expedientes_por_region, fn($count) => $count > 0));

        // Contar cuántos expedientes están en estado "incompleto"
        $pendientes = Expediente::where('estado', 'incompleto')->count();

        // Retornar la vista 'estadisticas' con todas las variables preparadas
        return view('estadisticas', compact(
            'nombres_regiones',
            'expedientes_por_region',
            'total_expedientes',
            'regiones_activas',
            'pendientes'
        ));
    }

}
