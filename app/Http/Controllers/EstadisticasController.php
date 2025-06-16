<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Expediente;

class EstadisticasController extends Controller
{
    //
public function index()
{
    $regiones = Region::all();

    $nombres_regiones = $regiones->pluck('nombre')->toArray();

    $expedientes_por_region_raw = Expediente::selectRaw('region_id, COUNT(*) as total')
        ->groupBy('region_id')
        ->pluck('total', 'region_id')
        ->toArray();

    // Mapear por cada región su total, o 0 si no tiene
    $expedientes_por_region = $regiones->map(function($region) use ($expedientes_por_region_raw) {
        return $expedientes_por_region_raw[$region->id] ?? 0;
    })->toArray();

    $total_expedientes = Expediente::count();

    $regiones_activas = count(array_filter($expedientes_por_region, fn($count) => $count > 0));

    $pendientes = Expediente::where('estado', 'incompleto')->count();

    return view('estadisticas', compact(
        'nombres_regiones',
        'expedientes_por_region',
        'total_expedientes',
        'regiones_activas',
        'pendientes'
    ));
}

}
