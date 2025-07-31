<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

use function PHPUnit\Framework\returnSelf; // ← Esto no parece necesario aquí y podría eliminarse si no se usa

class RegionController extends Controller
{
    // Muestra todas las regiones
    public function region(Request $request)
    {
        $regiones = Region::all(); // Obtiene todas las regiones de la base de datos
        return view('Region.region', compact('regiones')); // Retorna la vista con las regiones
    }    

    // Muestra el formulario para registrar una nueva región
    public function region_alta(){
        return view("Region.region_alta");
    }

    // Registra una nueva región en la base de datos
    public function region_registrar(Request $request){
        // Valida que los campos requeridos estén presentes
        $this->validate($request, [
            'numero_region' => 'required',
            'nombre' => 'required',
        ]);

        // Crea una nueva región con los datos del formulario
        Region::create([
            'numero_region' => $request->input('numero_region'),
            'nombre' => $request->input('nombre'),
        ]);

        // Redirige con un mensaje de éxito
        return redirect()->route('region')->with('success', 'Región registrada correctamente.');
    }

    // Muestra los detalles de una región específica
    public function region_detalle($id){
        $query = Region::find($id); // Busca la región por ID
        return view('Region.region_detalle')
            ->with(['region' => $query]); // Retorna la vista con los datos de la región
    }

    // Muestra el formulario para editar una región específica
    public function region_editar($id){
        $query = Region::find($id); // Busca la región por ID
        return view('Region.region_editar')
            ->with(['region' => $query]); // Retorna la vista con los datos de la región
    }

    // Guarda los cambios realizados a una región
    public function region_salvar(Region $id, Request $request){
        $query = Region::find($id->id); // Busca la región usando el modelo recibido como parámetro
        $query->numero_region = $request->numero_region; // Asigna el nuevo número de región
        $query->nombre = $request->nombre; // Asigna el nuevo nombre
        $query->save(); // Guarda los cambios

        return redirect()->route("region")->with('success', 'Región actualizada correctamente'); 
    }

    // Elimina una región
    public function region_borrar(Region $id){
        $id->delete(); // Elimina la región pasada como modelo
        return redirect()->route('region')->with('success', 'Región eliminada correctamente');
    }
}
