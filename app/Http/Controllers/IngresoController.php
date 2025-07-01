<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index(Request $request)
    {
        $año = $request->get('año', date('Y'));

        $ingresos = Ingreso::where('año', $año)->orderBy('mes')->get();
        $total = $ingresos->sum('cantidad');

        return view('ingresos.index', compact('ingresos', 'año', 'total'));
    }

    public function create()
    {
        return view('ingresos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mes' => 'required|integer|min:1|max:12',
            'año' => 'required|integer|min:2000|max:2100',
            'cantidad' => 'required|numeric|min:0',
        ]);

        Ingreso::create($request->all());

        return redirect()->route('ingresos.index')->with('success', 'Ingreso registrado.');
    }

    public function comparar(Request $request)
    {
        $año1 = $request->input('año1');
        $año2 = $request->input('año2');
    
        $años_disponibles = Ingreso::select('año')->distinct()->orderBy('año')->pluck('año');
    
        $ingresos1 = $año1 ? Ingreso::where('año', $año1)->get()->keyBy('mes') : collect();
        $ingresos2 = $año2 ? Ingreso::where('año', $año2)->get()->keyBy('mes') : collect();
    
        return view('ingresos.comparar', compact('ingresos1', 'ingresos2', 'año1', 'año2', 'años_disponibles'));
    }
    
}
