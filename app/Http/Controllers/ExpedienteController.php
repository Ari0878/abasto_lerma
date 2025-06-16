<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\Region;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Exports\ExpedientesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExpedienteController extends Controller
{
        // Vista principal con lista de expedientes paginados
        public function expediente(Request $request)
        {
            $query = Expediente::query();

            if ($request->filled('region_id')) {
                $query->where('region_id', $request->region_id);
            }

            if ($request->filled('buscar')) {
                $buscar = $request->buscar;
                $query->where(function ($q) use ($buscar) {
                    $q->where('folio', 'like', "%$buscar%")
                    ->orWhere('nombre', 'like', "%$buscar%")
                    ->orWhere('ap', 'like', "%$buscar%")
                    ->orWhere('am', 'like', "%$buscar%")
                    ->orWhere('localizacion', 'like', "%$buscar%")
                    ->orWhere('giro', 'like', "%$buscar%")
                    ->orWhere('estado', 'like', "%$buscar%")
                    ->orWhere('tipo_expe', 'like', "%$buscar%");
                });
            }

            $expedientes = $query->paginate(20)->appends($request->query());
            $regiones = Region::all();
            $expedientesTodos = Expediente::select('estado')->get();

            return view('Expediente.expediente', compact('expedientes', 'regiones', 'expedientesTodos'));
        }


        // Vista para crear expediente
    public function expediente_alta(Request $request)
        {
            $pagina = $request->input('page', 1); // valor por defecto si no viene
            $regiones = Region::all();

            return view('Expediente.expediente_alta', [
                'regiones' => $regiones,
                'pagina' => $pagina
            ]);
        }

        // Registrar nuevo expediente
        public function expediente_registrar(Request $request)
        {
            $this->validate($request, [
                'folio' => 'required',
                'ap' => 'required',
                'am' => 'required',
                'nombre' => 'required',
                'localizacion' => 'required',
                'giro' => 'required',
                'tipo_expe' => 'required',
                'estado' => 'required',
                'archivo.*' => 'nullable|file|mimes:pdf,doc,docx,txt|max:20480',
                'region_id' => 'required',
            ]);

            $archivos = [];

            if ($request->hasFile('archivo')) {
                foreach ($request->file('archivo') as $file) {
                    if ($file && $file->isValid()) {
                        $nombre = uniqid() . '_' . $file->getClientOriginalName();
                        $path = $file->storeAs('expedientes', $nombre, 'public');
                        $archivos[] = $nombre;
                        Log::info("Archivo guardado en: " . storage_path('app/public/expedientes/' . $nombre));
                    }
                }
            }

            $expediente = Expediente::create([
                'folio' => $request->folio,
                'ap' => $request->ap,
                'am' => $request->am,
                'nombre' => $request->nombre,
                'localizacion' => $request->localizacion,
                'giro' => $request->giro,
                'tipo_expe' => $request->tipo_expe,
                'estado' => $request->estado,
                'archivo' => implode(',', $archivos),
                'region_id' => $request->region_id,
            ]);

             $pagina = $request->input('page', 1);

            return redirect()->route('expediente', [
                'page' => $pagina,
                'region_id' => $request->region_id,
                'buscar' => $request->buscar,
            ])->with('success', 'Expediente registrado correctamente');
        }
        


        // Vista detalle expediente
        public function expediente_detalle($id)
        {
            $expediente = Expediente::findOrFail($id);
            return view('Expediente.expediente_detalle', compact('expediente'));
        }

        // Vista para editar expediente
        public function expediente_editar($id, Request $request)
        {
            $pagina = $request->input('page', 1);
            $expediente = Expediente::findOrFail($id);
            $regiones = Region::all();
            return view('Expediente.expediente_editar', compact('expediente', 'regiones', 'pagina'));
        }

        // Guardar cambios de expediente editado
        public function expediente_salvar(Expediente $id, Request $request)
        {
            $query = Expediente::findOrFail($id->id);

            $this->validate($request, [
                'folio' => 'required',
                'ap' => 'required',
                'am' => 'required',
                'nombre' => 'required',
                'localizacion' => 'required',
                'giro'=> 'required',
                'tipo_expe' => 'required',
                'estado' => 'required',
                'archivo.*' => 'nullable|file|mimes:pdf,doc,docx,txt|max:20480',
                'region_id' => 'required',
            ]);

            $archivos_nuevos = [];

            if ($request->hasFile('archivo')) {
                foreach ($request->file('archivo') as $file) {
                    if ($file && $file->isValid()) {
                        $nombre = uniqid() . '_' . $file->getClientOriginalName();
                        $path = $file->storeAs('expedientes', $nombre, 'public');
                        $archivos_nuevos[] = $nombre;
                        Log::info("Archivo nuevo guardado: $path");
                    }
                }
            }

            $archivos_anteriores = $query->archivo ? explode(',', $query->archivo) : [];
            $todos_los_archivos = array_merge($archivos_anteriores, $archivos_nuevos);

            $query->update([
                'folio' => $request->folio,
                'ap' => $request->ap,
                'am' => $request->am,
                'nombre' => $request->nombre,
                'localizacion' => $request->localizacion,
                'giro'=> $request->giro,
                'tipo_expe' => $request->tipo_expe,
                'estado' => $request->estado,
                'archivo' => implode(',', $todos_los_archivos),
                'region_id' => $request->region_id,
            ]);

            $pagina = $request->input('page', 1);

            return redirect()->route('expediente', [
                'page' => $pagina,
                // 'region_id' => $request->region_id,
                'buscar' => $request->buscar,
            ])->with('success', 'Expediente actualizado correctamente');
        }

        // Eliminar archivo de expediente
        public function eliminarArchivo(Request $request, $id)
        {
            $expediente = Expediente::findOrFail($id);
            $archivoAEliminar = $request->input('archivo');

            if (!$archivoAEliminar) {
                return back()->with('error', 'No se especificó el archivo a eliminar.');
            }

            $archivos = explode(',', $expediente->archivo);
            $archivos = array_filter($archivos, function ($archivo) use ($archivoAEliminar) {
                return trim($archivo) !== trim($archivoAEliminar);
            });

            $ruta = storage_path('app/public/expedientes/' . $archivoAEliminar);
            if (file_exists($ruta)) {
                unlink($ruta);
            }

            $expediente->archivo = implode(',', $archivos);
            $expediente->save();

            return back()->with('success', 'Archivo eliminado correctamente.');
        }


        // Archivar expediente
        public function expediente_archivar($id)
        {
            $pagina = request()->get('page', 1);

            $expediente = Expediente::findOrFail($id);
            $expediente->archivado = true;
            $expediente->save();

            return redirect()->route('expediente', ['page' => $pagina])
                            ->with('success', 'Expediente archivado correctamente');
        }

        // Desarchivar expediente
        public function expediente_desarchivar($id)
        {
            $pagina = request()->get('page', 1);

            $expediente = Expediente::findOrFail($id);
            $expediente->archivado = false;
            $expediente->save();

            return redirect()->route('expediente_archivados', ['page' => $pagina])
                            ->with('success', 'Expediente desarchivado correctamente');
        }

        // Lista de expedientes archivados
        public function expediente_archivados()
        {
            $expedientes = Expediente::where('archivado', true)->with('region')->paginate(10);
            return view('Expediente.expediente_archivados', compact('expedientes'));
        }

        // Borrar expediente
        public function expediente_borrar(Expediente $id)
        {
            $pagina = request()->get('page', 1);
            $id->delete();

            return redirect()->route('expediente', ['page' => $pagina])
                            ->with('success', 'Expediente eliminado correctamente');
        }

        // Ajax para buscar expedientes (no archivados)
        public function expediente_ajax(Request $request)
        {
            $query = Expediente::where('archivado', false);
            if ($request->filled('region_id')) {
                // $query->where('region_id', $request->region_id);
            }

            if ($request->filled('buscar')) {
                $buscar = $request->buscar;
                $query->where(function ($q) use ($buscar) {
                    $q->where('folio', 'like', "%$buscar%")
                    ->orWhere('nombre', 'like', "%$buscar%")
                    ->orWhere('ap', 'like', "%$buscar%")
                    ->orWhere('am', 'like', "%$buscar%")
                    ->orWhere('localizacion', 'like', "%$buscar%")
                    ->orWhere('giro', 'like', "%$buscar%")
                    ->orWhere('estado', 'like', "%$buscar%")
                    ->orWhere('tipo_expe', 'like', "%$buscar%");
                });
            }

            $expedientes = $query->paginate(20)->appends($request->except('page'));

            return view('Expediente.partials.tabla_expedientes', compact('expedientes'))->render();
        }

        // Exportar reporte general a Excel
        public function exportarReporteGeneral()
        {
            $expedientes = Expediente::with('region')->get();

            return Excel::download(new ExpedientesExport($expedientes), 'reporte_expedientes.xlsx');
        }

        // Buscar expediente por folio
        public function search(Request $request)
        {
            $request->validate([
                'numero_expediente' => 'required|string'
            ]);

            $expediente = Expediente::where('folio', $request->numero_expediente)
                ->with('region')
                ->first();

            if (!$expediente) {
                return back()->with('error', 'No se encontró ningún expediente con ese folio.');
            }

            return view('admin.search-expediente', compact('expediente'));
        }
    }
