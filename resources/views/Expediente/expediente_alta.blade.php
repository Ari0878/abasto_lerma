<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Expediente - Abasto y Comercio</title>
    
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --edomex-blue:rgb(224, 10, 10);
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header {
            background: linear-gradient(135deg, var(--edomex-blue) 0%, rgba(241, 9, 9, 0.68)100%);
            color: white;
            padding: 1rem 0;
            border-bottom: 5px solid var(--edomex-gold);
        }
        
        .logo {
            height: 60px;
            margin-right: 15px;
        }
        
        .title-container {
            border-left: 3px solid var(--edomex-gold);
            padding-left: 15px;
        }
        
        .card-shadow {
            box-shadow: 0 4px 8px rgba(241, 9, 9, 0.68);
            border-radius: 8px;
            border: none;
        }
        
        .btn-edomex {
            background-color: var(--edomex-blue);
            color: white;
            border: none;
        }
        
        .btn-edomex:hover {
            background-color:rgb(224, 10, 10);
            color: white;
        }
        
        .btn-edomex-outline {
            border: 1px solid var(--edomex-blue);
            color: var(--edomex-blue);
        }
        
        .btn-edomex-outline:hover {
            background-color: var(--edomex-blue);
            color: white;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--edomex-blue);
        }
        
        .footer {
            background-color: var(--edomex-blue);
            color: white;
            padding: 1.5rem 0;
            margin-top: 2rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Encabezado institucional -->
    <header class="header mb-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo">
                <div class="title-container">
                    <h1 class="h4 mb-0">Sistema de Gestión de Expedientes</h1>
                    <small>Abasto y Comercio</small>
                </div>
            </div>
        </div>
    </header>

    <div class="container mb-5">
        <div class="card card-shadow">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="h5 mb-0 text-primary"><i class="bi bi-file-earmark-plus me-2"></i>Nuevo Expediente</h2>
                        <small class="text-muted">Complete los datos requeridos</small>
                    </div>
                    <a href="{{ route('expediente', ['page' => request()->get('page', 1)]) }}" class="btn btn-edomex-outline">
                    <i class="bi bi-arrow-left me-1"></i> Regresar
                    </a>

                </div>
            </div>
            
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Por favor corrige los siguientes errores:</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('expediente_registrar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page" value="{{ $pagina }}">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <h5 class="border-bottom pb-2 mb-3">Datos Generales</h5>
                            
                            <div class="mb-3">
                                <label for="folio" class="form-label">Número de Expediente</label>
                                <input type="text" class="form-control" id="folio" name="folio" value="{{ old('folio') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="ap" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="ap" name="ap" value="{{ old('ap') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="am" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="am" name="am" value="{{ old('am') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h5 class="border-bottom pb-2 mb-3">Datos del Documento</h5>
                            
                            <div class="mb-3">
                                <label for="localizacion" class="form-label">Localización</label>
                                <input type="text" class="form-control" id="localizacion" name="localizacion" value="{{ old('localizacion') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="giro" class="form-label">Giro</label>
                                <input type="text" class="form-control" id="giro" name="giro" value="{{ old('giro') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipo_expe" class="form-label">Tipo de Expediente</label>
                                <input type="text" class="form-control" id="tipo_expe" name="tipo_expe" value="{{ old('tipo_expe') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado del Expediente</label>
                                <select class="form-select" id="estado" name="estado" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="Completo" {{ old('estado') == 'Completo' ? 'selected' : '' }}>Completo</option>
                                    <option value="Incompleto" {{ old('estado') == 'Incompleto' ? 'selected' : '' }}>Incompleto</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="region_id" class="form-label">Región</label>
                                <select class="form-select" id="region_id" name="region_id" required>
                                    <option value="">-- Seleccione una región --</option>
                                    @foreach($regiones as $region)
                                        <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                            {{ $region->numero_region }} - {{ $region->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="archivo" class="form-label">Documentos Adjuntos</label>
                                <input type="file" class="form-control" id="archivo" name="archivo[]" multiple>
                                <small class="text-muted">Formatos permitidos: PDF, DOC, DOCX, TXT (Máx. 20MB cada uno)</small>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-secondary me-md-2">
                                    <i class="bi bi-eraser me-1"></i> Limpiar
                                </button>
                                <button type="submit" class="btn btn-edomex">
                                    <i class="bi bi-save me-1"></i> Guardar Expediente
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });</script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>