<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visita;

class VisitaController extends Controller
{
    // Muestra una lista de visitas con búsqueda y paginación
    public function index(Request $request)
    {
        $query = Visita::query(); // Inicia la consulta de visitas

        // Si se envió un término de búsqueda, se filtran los resultados
        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre_completo', 'like', "%$buscar%")
                  ->orWhere('asunto', 'like', "%$buscar%")
                  ->orWhere('localidad', 'like', "%$buscar%")
                  ->orWhere('telefono', 'like', "%$buscar%");
            });
        }

        // Se obtienen los resultados paginados (2 por página), ordenados por fecha más reciente
        $visitas = $query->latest()->paginate(2)->appends($request->query());

        // Retorna la vista con los datos de visitas
        return view('visitas.index', compact('visitas'));
    }

    // Muestra el formulario para registrar una nueva visita
    public function create()
    {
        return view('visitas.create');
    }

    // Guarda una nueva visita en la base de datos
    public function store(Request $request)
    {
        // Validación de campos
        $request->validate([
            'fecha' => 'required|date',
            'nombre_completo' => 'required|string|max:255',
            'asunto' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        // Crea la visita con los datos validados
        Visita::create($request->all());

        // Redirige con mensaje de éxito
        return redirect()->route('visitas.index')->with('success', 'Visita registrada correctamente.');
    }

    // Muestra el formulario para editar una visita existente
    public function edit($id)
    {
        $visita = Visita::findOrFail($id); // Busca la visita o lanza error 404
        return view('visitas.edit', compact('visita'));
    }

    // Actualiza una visita existente en la base de datos
    public function update(Request $request, $id)
    {
        // Validación de campos
        $request->validate([
            'fecha' => 'required|date',
            'nombre_completo' => 'required|string|max:255',
            'asunto' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        $visita = Visita::findOrFail($id); // Busca la visita
        $visita->update($request->all()); // Actualiza con los nuevos datos

        // Redirige con mensaje de éxito
        return redirect()->route('visitas.index')->with('success', 'Visita actualizada correctamente.');
    }

    // Elimina una visita de la base de datos
    public function destroy($id)
    {
        $visita = Visita::findOrFail($id); // Busca la visita
        $visita->delete(); // Elimina la visita

        // Redirige con mensaje de éxito
        return redirect()->route('visitas.index')->with('success', 'Visita eliminada correctamente.');
    }

    // Exporta todas las visitas como un archivo CSV descargable
    public function exportarCSV()
    {
        $visitas = Visita::all(); // Obtiene todas las visitas

        $filename = "visitas.csv"; // Nombre del archivo CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        // Crea un stream de salida CSV
        $callback = function() use ($visitas) {
            $handle = fopen('php://output', 'w'); // Abre el flujo de salida

            // Cabeceras del archivo CSV
            fputcsv($handle, ['Fecha', 'Nombre Completo', 'Asunto', 'Localidad', 'Teléfono']);

            // Escribe cada visita como una fila
            foreach ($visitas as $visita) {
                fputcsv($handle, [
                    $visita->fecha,
                    $visita->nombre_completo,
                    $visita->asunto,
                    $visita->localidad,
                    $visita->telefono,
                ]);
            }

            fclose($handle); // Cierra el flujo
        };

        // Retorna la respuesta como descarga de archivo CSV
        return response()->stream($callback, 200, $headers);
    }
}
