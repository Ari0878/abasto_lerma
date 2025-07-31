<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IngresoController extends Controller
{
    // Muestra la lista de ingresos de un año específico
    public function index(Request $request)
    {
        // Obtiene el año desde la solicitud, o usa el año actual por defecto
        $año = $request->get('año', date('Y'));

        // Consulta los ingresos del año dado y los ordena por mes
        $ingresos = Ingreso::where('año', $año)->orderBy('mes')->get();

        // Suma el total de los ingresos del año
        $total = $ingresos->sum('cantidad');

        // Retorna la vista con los datos de ingresos, año y total
        return view('ingresos.index', compact('ingresos', 'año', 'total'));
    }

    // Muestra el formulario para crear un nuevo ingreso
    public function create()
    {
        return view('ingresos.create');
    }

    // Guarda un nuevo ingreso en la base de datos
    public function store(Request $request)
    {
        // Valida los datos recibidos del formulario
        $request->validate([
            'mes' => 'required|integer|min:1|max:12',           // Mes válido entre 1 y 12
            'año' => 'required|integer|min:2000|max:2100',      // Año válido entre 2000 y 2100
            'cantidad' => 'required|numeric|min:0',             // Cantidad positiva o cero
        ]);

        // Crea el ingreso con los datos validados
        Ingreso::create($request->all());

        // Redirige a la vista de ingresos con un mensaje de éxito
        return redirect()->route('ingresos.index')->with('success', 'Ingreso registrado.');
    }

    // Compara los ingresos entre dos años seleccionados
    public function comparar(Request $request)
    {
        // Obtiene los años seleccionados desde la solicitud
        $año1 = $request->input('año1');
        $año2 = $request->input('año2');

        // Obtiene la lista de años disponibles en la base de datos (sin duplicados)
        $años_disponibles = Ingreso::select('año')->distinct()->orderBy('año')->pluck('año');

        // Obtiene los ingresos del primer año y los organiza por mes
        $ingresos1 = $año1 ? Ingreso::where('año', $año1)->get()->keyBy('mes') : collect();

        // Obtiene los ingresos del segundo año y los organiza por mes
        $ingresos2 = $año2 ? Ingreso::where('año', $año2)->get()->keyBy('mes') : collect();

        // Configura la localización de Carbon al español para mostrar los nombres de los meses
        Carbon::setLocale('es');

        // Crea un array con los nombres de los meses en español (minúsculas)
        $meses = [];
        for ($i = 1; $i <= 12; $i++) {
            $meses[] = Carbon::create()->month($i)->locale('es')->isoFormat('MMMM');
        }

        // Retorna la vista de comparación con los datos necesarios
        return view('ingresos.comparar', compact('año1', 'año2', 'años_disponibles', 'ingresos1', 'ingresos2', 'meses'));
    }
}
