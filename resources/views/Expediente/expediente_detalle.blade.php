<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Expediente - Gobierno del Estado de México</title>
    
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --edomex-green: rgb(224, 10, 10);
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header {
            background: linear-gradient(135deg, var(--edomex-green) 0%,rgba(241, 9, 9, 0.68) 100%);
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
            box-shadow: 0 4px 8px rgb(224, 10, 10);
            border-radius: 8px;
            border: none;
        }
        
        .detail-card {
            border-left: 4px solid var(--edomex-green);
        }
        
        .badge-completo {
            background-color: #28a745;
        }
        
        .badge-incompleto {
            background-color: var(--edomex-red);
        }
        
        .footer {
            background-color: var(--edomex-green);
            color: white;
            padding: 1.5rem 0;
            margin-top: 2rem;
            font-size: 0.9rem;
        }
        
        .file-icon {
            font-size: 1.5rem;
            margin-right: 10px;
            color: var(--edomex-green);
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
                        <h2 class="h5 mb-0 text-primary">
                            <i class="bi bi-file-earmark-text me-2"></i>Detalles del Expediente
                        </h2>
                        <small class="text-muted">N° Expediente: {{ $expediente->folio }}</small>
                    </div>
                    <a href="{{ route('expediente', ['page' => request()->get('page', 1)]) }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Regresar
                    </a>

                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card detail-card mb-4">
                            <div class="card-body">
                                <h5 class="card-title border-bottom pb-2 mb-3">
                                    <i class="bi bi-person-lines-fill me-2"></i>Datos Personales
                                </h5>
                                
                                <div class="mb-3">
                                    <h6 class="mb-1 text-muted">Nombre Completo</h6>
                                    <p class="mb-0">{{ $expediente->ap }} {{ $expediente->am }} {{ $expediente->nombre }}</p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6 class="mb-1 text-muted">Región</h6>
                                    <p class="mb-0">{{ $expediente->region->nombre ?? 'No especificado' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card detail-card mb-4">
                            <div class="card-body">
                                <h5 class="card-title border-bottom pb-2 mb-3">
                                    <i class="bi bi-file-earmark-fill me-2"></i>Datos del Documento
                                </h5>
                                
                                <div class="mb-3">
                                    <h6 class="mb-1 text-muted">Localización</h6>
                                    <p class="mb-0">{{ $expediente->localizacion }}</p>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1 text-muted">Giro</h6>
                                    <p class="mb-0">{{ $expediente->giro }}</p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6 class="mb-1 text-muted">Tipo de Expediente</h6>
                                    <p class="mb-0">{{ $expediente->tipo_expe }}</p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6 class="mb-1 text-muted">Estado</h6>
                                    <p class="mb-0">
                                        @if($expediente->estado == 'Completo')
                                            <span class="badge badge-completo rounded-pill">Completo</span>
                                        @elseif($expediente->estado == 'Incompleto')
                                            <span class="badge badge-incompleto rounded-pill">Incompleto</span>
                                        @else
                                            <span class="badge bg-secondary rounded-pill">Sin estado</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card detail-card">
                    <div class="card-body">
                        <h5 class="card-title border-bottom pb-2 mb-3">
                            <i class="bi bi-paperclip me-2"></i>Documentos Adjuntos
                        </h5>
                        
                        @php
                            $archivos = explode(',', $expediente->archivo);
                        @endphp
                        
                        @if(count($archivos) > 0 && $archivos[0] != '')
                            <div class="list-group">
                                @foreach ($archivos as $archivo)
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center archivo-link" 
                                       data-bs-toggle="modal" data-bs-target="#visorArchivoModal"
                                       data-archivo="{{ asset('storage/expedientes/' . $archivo) }}">
                                       <i class="bi bi-file-earmark-pdf-fill"></i>
                                        <div>
                                            <h6 class="mb-1">{{ $archivo }}</h6>
                                            <small class="text-muted">Click para visualizar</small>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info mb-0">
                                <i class="bi bi-info-circle me-2"></i> No hay documentos adjuntos a este expediente.
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                <a href="{{ route('expediente_editar', ['id' => $expediente->id, 'page' => request()->get('page')]) }}" class="btn btn-primary me-md-2"> 
                    <i class="bi bi-pencil-square me-1"></i> Editar Expediente
                </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal para visualización de archivos -->
    <div class="modal fade" id="visorArchivoModal" tabindex="-1" aria-labelledby="visorArchivoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Visualización de Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <iframe id="visorArchivoFrame" src="" style="width: 100%; height: 75vh; border: none;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i> Cerrar
                    </button>
                    <a id="downloadLink" href="#" class="btn btn-primary">
                        <i class="bi bi-download me-1"></i> Vizualizar en otra pestaña
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });</script>
    <script>
        // Configuración del visor de archivos
        document.querySelectorAll('.archivo-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const archivoUrl = this.getAttribute('data-archivo');
                document.getElementById('visorArchivoFrame').src = archivoUrl;
                document.getElementById('downloadLink').href = archivoUrl;  
            });
        });
        
        // Limpiar iframe al cerrar el modal
        document.getElementById('visorArchivoModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('visorArchivoFrame').src = '';
        });
    </script>
</body>
</html>