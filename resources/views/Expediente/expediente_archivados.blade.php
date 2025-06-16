<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expedientes Archivados</title>

    <!-- Bootstrap y Bootstrap Icons -->
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
            background: linear-gradient(135deg, var(--edomex-green) 0%, rgba(241, 9, 9, 0.68) 100%);
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: none;
        }

        .table-header {
            background-color: var(--edomex-green);
            color: white;
        }

        .btn-edomex {
            background-color: var(--edomex-green);
            color: white;
            border: none;
        }

        .btn-edomex:hover {
            background-color: rgb(224, 10, 10);
            color: white;
        }

        .btn-outline-success {
            border-color: var(--edomex-green);
            color: var(--edomex-green);
        }

        .btn-outline-success:hover {
            background-color: var(--edomex-green);
            color: white;
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
                    <small>Abasto y comercio</small>
                </div>
            </div>
        </div>
    </header>

    <div class="container mb-5">
        <div class="card card-shadow">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="h5 mb-0 text-primary">Expedientes Archivados</h2>
                        <small class="text-muted">Consulta y recuperación de documentos archivados</small>
                    </div>
                    <a href="{{ route('expediente') }}" class="btn btn-outline-success">
                        <i class="bi bi-arrow-left"></i> Volver al listado
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-header">
                            <tr>
                                <th>#</th>
                                <th>Folio</th>
                                <th>Nombre</th>
                                <th>Giro</th>
                                <th>Tipo</th>
                                <th>Región</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($expedientes as $expediente)
                                <tr>
                                    <td>{{ $expediente->id }}</td>
                                    <td>{{ $expediente->folio }}</td>
                                    <td>{{ $expediente->ap }} {{ $expediente->am }} {{ $expediente->nombre }}</td>
                                    <td>{{ $expediente->giro }}</td>
                                    <td>{{ $expediente->tipo_expe }}</td>
                                    <td>
                                        @if($expediente->region)
                                            <span class="badge bg-light text-dark">
                                                {{ $expediente->region->numero_region }} - {{ $expediente->region->nombre }}
                                            </span>
                                        @else
                                            <span class="text-muted">Sin región</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($expediente->estado == 'Completo')
                                            <span class="badge bg-success">Completo</span>
                                        @elseif($expediente->estado == 'Incompleto')
                                            <span class="badge bg-danger">Incompleto</span>
                                        @else
                                            <span class="badge bg-secondary">Sin estado</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('expediente_desarchivar', $expediente->id) }}"
                                           class="btn btn-sm btn-outline-success"
                                           data-bs-toggle="tooltip" title="Desarchivar">
                                            <i class="bi bi-arrow-bar-up"></i> 
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">No hay expedientes archivados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $expedientes->links() }}
                </div>
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
