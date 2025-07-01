<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema de Expedientes - Abasto y Comercio</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <style>
        :root {
            --edomex-green:rgb(224, 10, 10);
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
        }
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .header-gobierno {
         background: linear-gradient(135deg, var(--edomex-green) 0%, rgb(241, 9, 9)100%); /* Verde institucional */
        border-bottom: 4px solid #FFD700; /* Dorado */
        }

        .logo {
         height: 70px;
        }

        .navbar-dark .navbar-nav .nav-link {
        color: #fff;
        font-weight: 500;
        margin-left: 1rem;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
        color: #FFD700;
        }
        

        /* .header {
            background: linear-gradient(135deg, var(--edomex-green) 0%, rgba(241, 9, 9, 0.68) 100%);
            color: white;
            padding: 1rem 0;
            border-bottom: 5px solid var(--edomex-gold);
        } */
        .logo {
            height: 60px;
            margin-right: 15px;
        }
        .title-container {
            border-left: 3px solid var(--edomex-gold);
            padding-left: 15px;
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
        .btn-edomex-outline {
            border: 1px solid var(--edomex-green);
            color: var(--edomex-green);
        }
        .btn-edomex-outline:hover {
            background-color: var(--edomex-green);
            color: white;
        }
        .badge-completo {
            background-color: rgb(11, 199, 55);
        }
        .badge-incompleto {
            background-color: var(--edomex-red);
        }
        .card-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: none;
        }
        .action-btn {
            width: 40px;
            height: 40px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin: 0 2px;
        }
        .pagination .page-item.active .page-link {
            background-color: var(--edomex-green);
            border-color: var(--edomex-green);
        }
        .pagination .page-link {
            color: var(--edomex-green);
        }
        .pagination .page-item.active .page-link {
    background-color: var(--edomex-green);
    border-color: var(--edomex-green);
    color: white !important; /* ← Asegura que el texto sea blanco */
}

        @media (max-width: 768px) {
    .navbar-nav {
        flex-direction: column;
    }
    .navbar-nav .nav-link {
        padding-left: 0;
    }
}
    </style>
</head>
<body>

    <!-- Encabezado institucional -->
<header class="header-gobierno mb-4">
    <div class="container-fluid py-2 px-4 d-flex align-items-center justify-content-between flex-wrap">
        <!-- Logo institucional -->
        <div class="d-flex align-items-center">
            <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo me-3" />
            <div class="d-none d-md-block">
                <h1 class="h5 mb-0 text-white fw-bold">Sistema de Gestión de Expedientes</h1>
                <small class="text-light">Dirección de Abasto y Comercio</small>
            </div>
        </div>

        <!-- Menú de navegación -->
        <nav class="navbar navbar-expand-md navbar-dark">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGob" aria-controls="navGob" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navGob">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.welcome') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('expediente') }}">Expediente</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('region') }}">Regiones</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('estadisticas') }}">Estadísticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ route('ingresos.index') }}">Ingresos</a></li>
                    <li class="nav-item dropdown ms-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }} <br>{{auth()->user()->role}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </li>
                </ul>
            </div>
        </nav>
    </div>
</header>



    <div class="container mb-5">
        <!-- Tarjeta contenedora -->
        <div class="card card-shadow">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="h5 mb-0 text-primary">Registro de Expedientes</h2>
                        <small class="text-muted">Administración y seguimiento documental</small>
                    </div>
                    <a href="{{ route('expediente_alta') }}" class="btn btn-edomex">
                        <i class="bi bi-person-plus me-1"></i> Nuevo Expediente
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                <!-- Formulario de búsqueda y filtro -->
                <form method="GET" action="{{ route('expediente') }}" class="row g-2 align-items-center mb-3">
                    <div class="col-md-6">
                        <input type="text" name="buscar" class="form-control" placeholder="Buscar expediente, nombre, tipo, estado, etc." value="{{ request('buscar') }}" />
                    </div>
                    <div class="col-md-3">
                        <select name="region_id" class="form-select">
                            <option value="">-- Filtrar por Región --</option>
                            @foreach($regiones as $region)
                                <option value="{{ $region->id }}" {{ request('region_id') == $region->id ? 'selected' : '' }}>
                                    {{ $region->numero_region }} - {{ $region->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button class="btn btn-edomex flex-grow-1" type="submit">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                        <a href="{{ route('expediente') }}" class="btn btn-outline-secondary flex-grow-1" title="Limpiar filtros">
                            <i class="bi bi-x-circle"></i> Limpiar
                        </a>
                    </div>
                </form>
                <!-- <a href="{{ url('/reporte-expedientes/excel') }}" class="btn btn-success">
                    Descargar reporte Excel
                </a> -->
                <a href="{{ route('expediente_archivados') }}" class="btn btn-edomex-outline mb-3">
                    <i class="bi bi-archive"></i> Ver Bajas
                </a>
                @if($expedientes->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
                        <div class="text-muted mb-2">
                            Mostrando {{ $expedientes->firstItem() }} a {{ $expedientes->lastItem() }} de {{ $expedientes->total() }} registros
                        </div>
                        <nav>
                            <ul class="pagination mb-0">
                                {{-- Botón anterior --}}
                                @if($expedientes->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">«</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $expedientes->previousPageUrl() }}" rel="prev">«</a></li>
                                @endif

                                {{-- Rango de páginas dinámico --}}
                                @php
                                    $currentPage = $expedientes->currentPage();
                                    $lastPage = $expedientes->lastPage();
                                    $start = max(1, $currentPage - 1);
                                    $end = min($lastPage, $currentPage + 1);
                                @endphp

                                {{-- Primera página y puntos suspensivos --}}
                                @if($start > 1)
                                    <li class="page-item"><a class="page-link" href="{{ $expedientes->url(1) }}">1</a></li>
                                    @if($start > 2)
                                        <li class="page-item disabled"><span class="page-link">…</span></li>
                                    @endif
                                @endif

                                {{-- Páginas centradas --}}
                                @for ($i = $start; $i <= $end; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $expedientes->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Última página y puntos suspensivos --}}
                                @if($end < $lastPage)
                                    @if($end < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">…</span></li>
                                    @endif
                                    <li class="page-item"><a class="page-link" href="{{ $expedientes->url($lastPage) }}">{{ $lastPage }}</a></li>
                                @endif

                                {{-- Botón siguiente --}}
                                @if($expedientes->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $expedientes->nextPageUrl() }}" rel="next">»</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">»</span></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @endif
                <!-- Tabla responsiva -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0">
                        <thead class="table-header">
                            <tr>
                                <th></th>
                                <th class="text-center">#</th>
                                <th>N° Expediente</th>
                                <th>Nombre Completo</th>
                                <th>Localización</th>
                                <th>Giro</th>
                                <th class="text-center">Estado</th>
                                <th>Tipo</th>
                                <th>Documentos</th>
                                <th>Región</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expedientes as $expediente)
                                <tr>
                                    <td><i class="bi bi-person-lines-fill" style="color:rgb(5, 25, 136);"></i></td>
                                    <td class="text-center">{{ $expediente->id }}</td>
                                    <td class="fw-bold">{{ $expediente->folio }}</td>
                                    <td>{{ $expediente->ap }} {{ $expediente->am }} {{ $expediente->nombre }}</td>
                                    <td>{{ $expediente->localizacion }}</td>
                                    <td>{{ $expediente->giro }}</td>
                                        <td class="text-center">
                                            @if($expediente->estado == 'Completo')
                                                <span class="badge badge-completo rounded-pill">Completo</span>
                                            @elseif($expediente->estado == 'Incompleto')
                                                <span class="badge badge-incompleto rounded-pill">Incompleto</span>
                                            @else
                                                <span class="badge bg-secondary rounded-pill">Sin estado</span>
                                            @endif
                                        </td>
                                    <td>{{ $expediente->tipo_expe }}</td>
                                    <td>
                                        @if($expediente->archivo)
                                            <i class="bi bi-file-earmark-text text-primary me-1"></i>
                                            {{ count(explode(',', $expediente->archivo)) }} documento(s)
                                        @else
                                            <span class="text-muted">Sin documentos</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($expediente->region)
                                            <span class="badge bg-light text-dark">
                                                {{ $expediente->region->numero_region }} - {{ $expediente->region->nombre }}
                                            </span>
                                        @else
                                            <span class="text-muted">Sin región</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <!-- Ver detalles (mantener página actual) -->
                                            <a href="{{ route('expediente_detalle', ['id' => $expediente->id, 'page' => $expedientes->currentPage()]) }}"
                                            class="btn btn-sm btn-outline-primary action-btn"
                                            data-bs-toggle="tooltip" title="Ver detalles">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <!-- Editar (mantener página actual) -->
                                            <a href="{{ route('expediente_editar', ['id' => $expediente->id, 'page' => $expedientes->currentPage()]) }}"
                                            class="btn btn-sm btn-outline-warning action-btn"
                                            data-bs-toggle="tooltip" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <!-- Archivar (mantener página actual) -->
                                            <a href="{{ route('expediente_archivar', ['id' => $expediente->id, 'page' => $expedientes->currentPage()]) }}"
                                            class="btn btn-outline-info action-btn"
                                            data-bs-toggle="tooltip" title="Baja">
                                                <i class="bi bi-folder-x"></i>
                                            </a>

                                            <!-- Eliminar (mantener página actual usando input hidden) -->
                                            <form action="{{ route('expediente_borrar', $expediente->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="page" value="{{ $expedientes->currentPage() }}">
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger action-btn"
                                                        data-bs-toggle="tooltip"
                                                        title="Eliminar"
                                                        onclick="return confirm('¿Está completamente seguro de eliminar este expediente? Esta acción es irreversible.')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
            </div>
        </div>

        <!-- Gráfica de pastel por región -->
        <div class="mb-4">
            <h5 class="text-secondary">Distribución de Expedientes por Región</h5>
            <div style="width: 100%; max-width: 500px; margin: auto;">
                <canvas id="regionPieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS + Tooltip Init -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inicializar tooltips y confirmaciones
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl, { trigger: 'hover' });
            });
        });
    </script>

@php
    $estadosData = [
        'completo' => $expedientesTodos->where('estado', 'Completo')->count(),
        'incompleto' => $expedientesTodos->where('estado', 'Incompleto')->count(),
        'sin_estado' => $expedientesTodos->whereNull('estado')->count()
    ];
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('regionPieChart').getContext('2d');
        
        // Convertir los datos PHP a JavaScript usando JSON
        const estadosData = @json($estadosData);

        const estadoData = {
            labels: ['Completo', 'Incompleto', 'Sin estado'],
            datasets: [{
                data: [
                    estadosData.completo,
                    estadosData.incompleto,
                    estadosData.sin_estado
                ],
                backgroundColor: [
                    '#30B43B', // Verde institucional
                    '#E4002B', // Rojo institucional
                    '#b0b0b0'  // Gris para sin estado
                ],
                borderColor: '#ffffff',
                borderWidth: 2
            }]
        };

        new Chart(ctx, {
            type: 'pie',
            data: estadoData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#333',
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} expediente(s) (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
<script>    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });</script>
</body>
</html>
