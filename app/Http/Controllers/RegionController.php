<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

use function PHPUnit\Framework\returnSelf;

class RegionController extends Controller
{
    public function region(Request $request)
    {
        $regiones = Region::all(); 
        return view('Region.region', compact('regiones'));
    }    
    public function region_alta(){
        return view ("Region.region_alta");
    }

    public function region_registrar(Request $request){
        $this->validate($request,[
            'numero_region' => 'required',
            'nombre' => 'required',
        ]);

        Region::create(array(
            'numero_region' => $request->input('numero_region'),
            'nombre'=>$request->input('nombre'),
        ));

        return redirect()->route('region')->with('success', 'Región registrada correctamente.');
    }


    //Detalles

    public function region_detalle($id){
        $query = Region::find($id);
        return view('Region.region_detalle')
        ->with(['region' =>$query]);
    }

    //Editar

    public function region_editar($id){
        $query = Region::find($id);
        return view('Region.region_editar')
        ->with(['region' => $query]);
        
    }


    public function region_salvar(Region $id, Request $request){
        $query = Region::find($id->id);
        $query->numero_region = $request->numero_region;
        $query->nombre = $request->nombre;
        $query->save();
    
        return redirect()->route("region")->with('success', 'Región actualizada correctamente'); 
    }
    
    //Borrar

    public function region_borrar(Region $id){
        $id->delete();
        return redirect()->route('region')->with('success', 'Región eliminada correctamente');
    }
}
