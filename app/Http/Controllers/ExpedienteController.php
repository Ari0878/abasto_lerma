<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Expediente;
use App\Models\Region;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Exports\ExpedientesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Visita;

class ExpedienteController extends Controller
{
    // Vista principal con lista de expedientes paginados
    public function expediente(Request $request)
    {
        $query = Expediente::query();

        // Filtrar por región si se especifica
        if ($request->filled('region_id')) {
            $query->where('region_id', $request->region_id);
        }

        // Filtrar por término de búsqueda en varios campos
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
                ->orWhere('tipo_expe', 'like', "%$buscar%")
                // Buscar concatenación de nombres y apellidos en distintos órdenes
                ->orWhere(DB::raw("CONCAT(nombre, ' ', ap, ' ', am)"), 'like', "%$buscar%")
                ->orWhere(DB::raw("CONCAT(ap, ' ', am, ' ', nombre)"), 'like', "%$buscar%");
            });
        }

        // Obtener expedientes paginados y conservar query strings
        $expedientes = $query->paginate(7)->appends($request->query());
        $regiones = Region::all();
        $visitas = Visita::all(); // Se recuperan todas las visitas, aunque no se usan aquí explícitamente
        $expedientesTodos = Expediente::select('estado')->get();

        return view('Expediente.expediente', compact('expedientes', 'regiones', 'expedientesTodos'));
    }

    // Vista para formulario de creación de expediente
    public function expediente_alta(Request $request)
    {
        $pagina = $request->input('page', 1); // Captura el número de página para redireccionar después
        $regiones = Region::all();

        return view('Expediente.expediente_alta', [
            'regiones' => $regiones,
            'pagina' => $pagina
        ]);
    }

    // Registrar un nuevo expediente
    public function expediente_registrar(Request $request)
    {
        // Validación de campos y archivos adjuntos
        $this->validate($request, [
            'folio' => 'required|unique:expediente,folio',
            'ap' => 'required',
            'am' => 'required',
            'nombre' => 'required',
            'localizacion' => 'required',
            'giro' => 'required',
            'tipo_expe' => 'required',
            'estado' => 'required',
            'archivo.*' => 'nullable|file|mimes:pdf,doc,docx,txt|max:20480',
            'region_id' => 'required',
        ], [
            // Mensajes personalizados de error para cada campo
            'folio.required' => 'El folio es obligatorio.',
            'folio.unique' => 'Ya existe un expediente con este folio.',
            'ap.required' => 'El apellido paterno es obligatorio.',
            'am.required' => 'El apellido materno es obligatorio.',
            'nombre.required' => 'El nombre es obligatorio.',
            'localizacion.required' => 'La localización es obligatoria.',
            'giro.required' => 'El giro es obligatorio.',
            'tipo_expe.required' => 'El tipo de expediente es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
            'archivo.*.file' => 'Cada archivo debe ser un archivo válido.',
            'archivo.*.mimes' => 'Los archivos deben ser pdf, doc, docx o txt.',
            'archivo.*.max' => 'El tamaño máximo por archivo es 20MB.',
            'region_id.required' => 'La región es obligatoria.',
        ]);

        $archivos = [];

        // Si hay archivos adjuntos, se guardan en almacenamiento público
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

        // Normalizamos folio quitando ceros a la izquierda para evitar duplicados similares
        $folioIngresado = ltrim($request->folio, '0');

        // Verificamos si existe un folio equivalente (sin importar formato de ceros)
        $folioExistente = Expediente::all()->first(function ($exp) use ($folioIngresado) {
            return ltrim($exp->folio, '0') === $folioIngresado;
        });

        if ($folioExistente) {
            // Si existe, retorna error con mensaje
            return back()->withErrors([
                'folio' => 'Ya existe un expediente con un folio equivalente, aunque el formato sea diferente.'
            ])->withInput();
        }

        // Creamos el expediente con datos y archivos concatenados en string
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

        // Redirige a la lista principal con página y filtros actuales
        return redirect()->route('expediente', [
            'page' => $pagina,
            'region_id' => $request->region_id,
            'buscar' => $request->buscar,
        ])->with('success', 'Expediente registrado correctamente');
    }
    
    // Mostrar detalle de un expediente
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

    // Guardar cambios tras editar un expediente
    public function expediente_salvar(Expediente $id, Request $request)
    {
        $query = Expediente::findOrFail($id->id);

        // Validar datos actualizados y archivos nuevos opcionales
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

        // Guardar archivos nuevos si hay
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

        // Obtener archivos anteriores, y unir con los nuevos
        $archivos_anteriores = $query->archivo ? explode(',', $query->archivo) : [];
        $todos_los_archivos = array_merge($archivos_anteriores, $archivos_nuevos);

        // Actualizar expediente con nuevos datos y archivos
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

        // Redirigir a la lista con mensaje de éxito
        return redirect()->route('expediente', [
            'page' => $pagina,
            'buscar' => $request->buscar,
        ])->with('success', 'Expediente actualizado correctamente');
    }

    // Eliminar archivo específico de un expediente (vía AJAX)
    public function eliminarArchivo(Request $request, $id)
    {
        $expediente = Expediente::findOrFail($id);
        $archivoAEliminar = trim($request->input('archivo'));

        // Validar que se haya enviado archivo a eliminar
        if (!$archivoAEliminar) {
            return response()->json(['error' => 'No se especificó el archivo a eliminar.'], 422);
        }

        // Filtrar archivos para remover el solicitado
        $archivos = explode(',', $expediente->archivo);
        $archivos = array_filter($archivos, function ($archivo) use ($archivoAEliminar) {
            return trim($archivo) !== $archivoAEliminar;
        });

        // Ruta completa del archivo físico en disco
        $ruta = storage_path('app/public/expedientes/' . $archivoAEliminar);

        if (file_exists($ruta)) {
            // Intentar eliminar archivo del servidor
            if (!unlink($ruta)) {
                return response()->json(['error' => 'No se pudo borrar el archivo físico.'], 500);
            }
        } else {
            return response()->json(['error' => 'El archivo físico no existe en el servidor.'], 404);
        }

        // Actualizar campo archivo sin el archivo eliminado
        $expediente->archivo = implode(',', $archivos);
        $expediente->save();

        // Retornar éxito y lista de archivos restantes
        return response()->json(['success' => 'Archivo eliminado correctamente.', 'archivos_restantes' => $archivos]);
    }

    // Marcar expediente como archivado
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

    // Mostrar lista de expedientes archivados
    public function expediente_archivados()
    {
        $expedientes = Expediente::where('archivado', true)->with('region')->paginate(10);
        return view('Expediente.expediente_archivados', compact('expedientes'));
    }

    // Borrar expediente permanentemente
    public function expediente_borrar(Expediente $id)
    {
        $pagina = request()->get('page', 1);
        $id->delete();

        return redirect()->route('expediente', ['page' => $pagina])
                        ->with('success', 'Expediente eliminado correctamente');
    }

    // Ajax para buscar expedientes (solo no archivados)
    public function expediente_ajax(Request $request)
    {
        $query = Expediente::where('archivado', false);

        if ($request->filled('region_id')) {
            // El filtro por región está comentado, puede activarse si se desea
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

        // Retorna vista parcial con la tabla de expedientes filtrados
        return view('Expediente.partials.tabla_expedientes', compact('expedientes'))->render();
    }

    // Exportar reporte general de expedientes a Excel
    public function exportarReporteGeneral()
    {
        $expedientes = Expediente::with('region')->get();

        // Usar export para generar archivo Excel y descargarlo
        return Excel::download(new ExpedientesExport($expedientes), 'reporte_expedientes.xlsx');
    }

    // Buscar expediente por número de folio
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

    // Mostrar archivo almacenado en el servidor para visualización inline
    public function mostrarArchivo($filename)
    {
        // Limpia y asegura el nombre del archivo para evitar path traversal
        $filename = basename(trim($filename));
        
        // Ruta completa al archivo
        $path = storage_path('app/public/expedientes/'.$filename);
    
        // Verifica existencia del archivo
        if (!file_exists($path)) {
            abort(404, "El archivo no existe");
        }
    
        // Obtiene el tipo MIME correcto para la respuesta
        $mime = mime_content_type($path);
    
        // Configura los headers para mostrar archivo inline en navegador
        $headers = [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ];
    
        // Devuelve el archivo con los headers apropiados
        return response()->file($path, $headers);
    }
}
