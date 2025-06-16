<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Expediente - Abasto y Comercio</title>
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />

    <style>
        :root {
            --edomex-green: #17c124;
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header-gobierno {
            background: linear-gradient(135deg, var(--edomex-green) 0%, rgb(9, 171, 23) 100%);
            border-bottom: 4px solid var(--edomex-gold);
        }

        .logo {
            height: 70px;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
            margin-left: 1rem;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: var(--edomex-gold);
        }

        .btn-edomex {
            background-color: var(--edomex-green);
            color: white;
            font-weight: bold;
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
        }

        .btn-edomex:hover {
            background-color: rgb(3, 142, 26);
            color: white;
        }

        .search-container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin-top: 2rem;
        }

        .detail-card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }

        .detail-card:hover {
            transform: translateY(-2px);
        }

        .badge-completo {
            background-color: #28a745;
            color: white;
            padding: 0.5em 1em;
        }

        .badge-incompleto {
            background-color: #dc3545;
            color: white;
            padding: 0.5em 1em;
        }

        .archivo-link {
            text-decoration: none;
            color: inherit;
            transition: background-color 0.2s;
        }

        .archivo-link:hover {
            background-color: #f8f9fa;
        }

        .archivo-link i {
            font-size: 1.5rem;
            margin-right: 1rem;
            color: #dc3545;
        }

        .card-title {
            color: #333;
            font-weight: 600;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .modal-content {
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .input-group {
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="header-gobierno mb-4">
        <div class="container-fluid py-2 px-4 d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center">
                <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo me-3" />
                <div class="d-none d-md-block">
                    <h1 class="h5 mb-0 text-white fw-bold">Sistema de Gestión</h1>
                    <small class="text-light">Dirección de Abasto y Comercio</small>
                </div>
            </div>

            <nav class="navbar navbar-expand-md navbar-dark">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGob" aria-controls="navGob" aria-expanded="false" aria-label="Menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navGob">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }} <br> <small>{{ ucfirst(auth()->user()->role) }}</small>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2 fs-5"></i> Cerrar sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="search-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Buscar Expediente</h2>
            <a href="{{ route('usuario.welcome') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i> Volver
            </a>
        </div>
        
        <form action="{{ route('expediente.search') }}" method="GET" class="mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" name="numero_expediente" placeholder="Ingrese el folio del expediente" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-edomex w-100">
                        <i class="bi bi-search me-2"></i> Buscar
                    </button>
                </div>
            </div>
        </form>

        @if(isset($expediente))
            <div class="card">
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
                                        <h6 class="mb-1 text-muted">Folio</h6>
                                        <p class="mb-0">{{ $expediente->folio }}</p>
                                    </div>

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
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>

<!-- Modal para visualizar archivos -->
<div class="modal fade" id="visorArchivoModal" tabindex="-1" aria-labelledby="visorArchivoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visorArchivoModalLabel">Visualizador de Documentos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="visorArchivo" style="width: 100%; height: 500px; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const archivoLinks = document.querySelectorAll('.archivo-link');
        const visorArchivo = document.getElementById('visorArchivo');

        archivoLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.dataset.archivo;
                visorArchivo.src = url;
            });
        });

        // Limpiar el iframe cuando se cierra el modal
        const modal = document.getElementById('visorArchivoModal');
        modal.addEventListener('hidden.bs.modal', function () {
            visorArchivo.src = '';
        });
    });
</script>
</body>
</html>
