<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema de Expedientes - Abasto y Comercio</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
      --edomex-green:rgb(236, 29, 29);
      --edomex-green-dark:rgba(233, 9, 9, 0.93);
      --edomex-green-light: #f9e8e8;
      --edomex-white: #FFFFFF;
      --edomex-gold: #FFD700;
      --edomex-gray: #6c757d;
      --edomex-light: #f8f9fa;
      --shadow-light: 0 2px 15px rgba(0,0,0,0.08);
      --shadow-medium: 0 8px 30px rgba(0,0,0,0.12);
      --shadow-heavy: 0 15px 50px rgba(0,0,0,0.15);
      --gradient-bg: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      --gradient-green: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
        }

        * {
            transition: all 0.3s ease;
        }

        body {
            background: var(--edomex-light);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
            color: #333;
        }

        /* ===== HEADER MEJORADO ===== */
        .header-gobierno {
            background: var(--gradient-green);
            border-bottom: 4px solid var(--edomex-gold);
            box-shadow: var(--shadow-medium);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .header-container {
            padding: 0.5rem 2rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo {
            height: 60px;
            filter: brightness(0) invert(1);
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .header-titles {
            color: white;
        }

        .header-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
            letter-spacing: 0.5px;
        }

        .header-subtitle {
            font-size: 0.85rem;
            opacity: 0.9;
            font-weight: 400;
        }

        /* Navbar mejorado */
        .navbar-nav .nav-item {
            margin: 0 0.3rem;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background: rgba(255,255,255,0.15);
            color: var(--edomex-gold);
        }

        .navbar-nav .nav-link i {
            font-size: 1.1rem;
        }

        /* Dropdown mejorado */
        .dropdown-toggle::after {
            margin-left: 0.5rem;
            vertical-align: middle;
        }

        .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: var(--shadow-heavy);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .dropdown-item:hover {
            background: var(--edomex-green-light);
            color: var(--edomex-green-dark);
        }

        .dropdown-divider {
            margin: 0.5rem 0;
        }

        /* ===== CONTENIDO PRINCIPAL ===== */
        .main-content {
            padding: 2rem 0 4rem;
            position: relative;
            z-index: 1;
        }
        .expediente-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .expediente-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .expediente-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .expediente-header {
            background: var(--edomex-green);
            color: white;
            padding: 1rem;
            position: relative;
        }

        .expediente-folio {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0;
        }

        .expediente-id {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255,255,255,0.2);
            border-radius: 50px;
            padding: 0.2rem 0.7rem;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .expediente-body {
            padding: 1.5rem;
        }

        .expediente-nombre {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--edomex-green-dark);
        }

        .expediente-info {
            margin-bottom: 1rem;
        }

        .expediente-info-item {
            display: flex;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .expediente-info-label {
            font-weight: 600;
            color: var(--edomex-gray);
            min-width: 100px;
        }

        .expediente-info-value {
            flex: 1;
        }

        .expediente-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 1.5rem;
            background: var(--edomex-light);
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .expediente-estado {
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .estado-completo {
            background-color: #30B43B;
            color: white;
        }

        .estado-incompleto {
            background-color: #E4002B;
            color: white;
        }

        .estado-sin {
            background-color: #b0b0b0;
            color: white;
        }

        .expediente-actions {
            display: flex;
            gap: 0.5rem;
        }
        /* Card mejorada */
        .card-modern {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-medium);
            overflow: hidden;
        }

        .card-header-modern {
            background: white;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: relative;
        }

        .card-header-modern::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-green);
        }

        .card-title-modern {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        /* Botón mejorado */
        .btn-edomex {
            background: var(--gradient-green);
            color: white;
            font-weight: 600;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            border: none;
            box-shadow: var(--shadow-light);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            transition: all 0.3s ease;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .btn-edomex:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
            color: white;
            background: linear-gradient(135deg, var(--edomex-green-dark) 0%, var(--edomex-green) 100%);
        }

        .btn-edomex-outline {
            border: 2px solid var(--edomex-green);
            color: var(--edomex-green);
            background: white;
            font-weight: 600;
        }

        .btn-edomex-outline:hover {
            background: var(--edomex-green);
            color: white;
        }

        /* Tabla mejorada */
        .table-modern {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: var(--shadow-light);
        }

        .table-modern thead {
            background: var(--gradient-green);
        }

        .table-modern thead th {
            color: white;
            padding: 1rem;
            text-align: left;
            font-size: 0.95rem;
            font-weight: 600;
            border-bottom: none;
        }

        .table-modern tbody tr {
            transition: background-color 0.3s ease;
        }

        .table-modern tbody tr:hover {
            background-color: var(--edomex-green-light);
        }

        .table-modern tbody td {
            padding: 1rem;
            font-size: 0.95rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            vertical-align: middle;
        }

        /* Badges */
        .badge-completo {
            background-color: #30B43B;
            color: white;
        }
        .badge-incompleto {
            background-color: #E4002B;
            color: white;
        }

        /* Botones de acción */
        .action-btn {
            width: 36px;
            height: 36px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin: 0 2px;
            background-color: #f8f9fa;
            transition: all 0.2s;
            border: 1px solid transparent;
        }

        .action-btn:hover {
            background-color: #e9ecef;
            border-color: #ced4da;
            transform: translateY(-2px);
        }

        /* Alertas mejoradas */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 500;
            box-shadow: var(--shadow-light);
        }

        /* Efecto de onda en el fondo */
        .wave-bg {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20vh;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%23e00a0a"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".1" fill="%23e00a0a"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" opacity=".05" fill="%23e00a0a"></path></svg>');
            background-size: cover;
            background-repeat: no-repeat;
            z-index: 0;
            pointer-events: none;
        }
        /* Paginación empresarial */
.pagination {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.4rem;
    margin-top: 1.5rem;
}

.pagination .page-item {
    transition: all 0.3s ease;
}

.pagination .page-link {
    color: var(--edomex-green-dark);
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 50px;
    padding: 0.45rem 0.9rem;
    font-weight: 500;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.pagination .page-item:hover .page-link {
    background-color: var(--edomex-green-light);
    color: var(--edomex-green-dark);
    border-color: var(--edomex-green-dark);
}

.pagination .page-item.active .page-link {
    background-color: var(--edomex-green-dark);
    color: white;
    border-color: var(--edomex-green-dark);
    font-weight: 600;
}

.pagination .page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}


        /* Responsive */
        @media (max-width: 992px) {
            .header-container {
                padding: 0.5rem 1rem;
            }
        }

        @media (max-width: 768px) {
            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.8rem;
            }
            
            .action-btn {
                width: 32px;
                height: 32px;
            }
        }

        @media (max-width: 576px) {
            .header-title {
                font-size: 1.2rem;
            }
            
            .header-subtitle {
                font-size: 0.75rem;
            }
            
            .logo {
                height: 50px;
            }
            
            .card-title-modern {
                font-size: 1.2rem;
            }
            
            .btn-edomex {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<!-- Header Mejorado -->
<header class="header-gobierno">
    <div class="container-fluid header-container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo-container">
                <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo" />
                <div class="header-titles d-none d-md-block">
                    <div class="header-title">Sistema de Gestión de Expedientes</div>
                    <div class="header-subtitle">Dirección de Abasto y Comercio</div>
                </div>
            </div>

            <nav class="navbar navbar-expand-md navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGob" aria-controls="navGob" aria-expanded="false" aria-label="Menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navGob">
                    <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.welcome') }}"><i class="bi bi-house-door"></i> Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('expediente') }}"><i class="bi bi-folder"></i> Expediente</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('region') }}"><i class="bi bi-geo-alt"></i> Regiones</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('estadisticas') }}"><i class="bi bi-bar-chart"></i> Estadísticas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i class="bi bi-people"></i> Usuarios</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('visitas.index') }}"><i class="bi bi-person-lines-fill"></i> Visitas</a></li>
                        
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>
                                <!-- <span class="d-none d-lg-inline">{{ auth()->user()->name }}</span> -->
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="px-3 py-2 text-center border-bottom">
                                    <strong>{{ auth()->user()->name }}</strong><br>
                                    <small class="text-muted">{{ ucfirst(auth()->user()->role) }}</small>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Fondo de onda decorativo -->
<div class="wave-bg"></div>

<!-- Contenido Principal -->
<div class="container main-content">
    <!-- Tarjeta contenedora -->
    <div class="card card-modern mb-4">
        <div class="card-header-modern">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="card-title-modern">
                    <i class="bi bi-folder-fill"></i>
                    Registro de Expedientes
                </h2>
                <a href="{{ route('expediente_alta') }}" class="btn-edomex">
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
            <form method="GET" action="{{ route('expediente') }}" class="row g-2 align-items-center mb-4">
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

                {{-- Botón "Primera" --}}
                <li class="page-item {{ $expedientes->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $expedientes->url(1) }}" aria-label="Primera">« Primera</a>
                </li>

                {{-- Botón "Anterior" --}}
                <li class="page-item {{ $expedientes->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $expedientes->previousPageUrl() }}" aria-label="Anterior">‹</a>
                </li>

                {{-- Rango limitado: solo página anterior, actual y siguiente --}}
                @php
                    $currentPage = $expedientes->currentPage();
                    $lastPage = $expedientes->lastPage();
                    $start = max(1, $currentPage - 1);
                    $end = min($lastPage, $currentPage + 1);
                @endphp

                @for ($i = $start; $i <= $end; $i++)
                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                        <a class="page-link" href="{{ $expedientes->appends(request()->query())->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Botón "Siguiente" --}}
                <li class="page-item {{ !$expedientes->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $expedientes->nextPageUrl() }}" aria-label="Siguiente">›</a>
                </li>

                {{-- Botón "Última" --}}
                <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $expedientes->url($lastPage) }}" aria-label="Última">Última »</a>
                </li>

            </ul>
        </nav>
    </div>
@endif


            
            <!-- Tabla responsiva -->
            <div class="expediente-grid">
                @foreach($expedientes as $expediente)
                    <div class="expediente-card">
                        <div class="expediente-header">
                            <p class="expediente-folio">{{ $expediente->folio }}</p>
                            <span class="expediente-id">#{{ $expediente->id }}</span>
                        </div>
                        
                        <div class="expediente-body">
                            <h3 class="expediente-nombre">{{ $expediente->ap }} {{ $expediente->am }} {{ $expediente->nombre }}</h3>
                            
                            <div class="expediente-info">
                                <div class="expediente-info-item">
                                    <span class="expediente-info-label">Localización:</span>
                                    <span class="expediente-info-value">{{ $expediente->localizacion }}</span>
                                </div>
                                <div class="expediente-info-item">
                                    <span class="expediente-info-label">Giro:</span>
                                    <span class="expediente-info-value">{{ $expediente->giro }}</span>
                                </div>
                                <div class="expediente-info-item">
                                    <span class="expediente-info-label">Tipo:</span>
                                    <span class="expediente-info-value">{{ $expediente->tipo_expe }}</span>
                                </div>
                                <div class="expediente-info-item">
                                    <span class="expediente-info-label">Documentos:</span>
                                    <span class="expediente-info-value">
                                        @if($expediente->archivo)
                                            <i class="bi bi-file-earmark-text text-primary me-1"></i>
                                            {{ count(explode(',', $expediente->archivo)) }} documento(s)
                                        @else
                                            <span class="text-muted">Sin documentos</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="expediente-info-item">
                                    <span class="expediente-info-label">Región:</span>
                                    <span class="expediente-info-value">
                                        @if($expediente->region)
                                            {{ $expediente->region->numero_region }} - {{ $expediente->region->nombre }}
                                        @else
                                            <span class="text-muted">Sin región</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="expediente-footer">
                            @if($expediente->estado == 'Completo')
                                <span class="expediente-estado estado-completo">Completo</span>
                            @elseif($expediente->estado == 'Incompleto')
                                <span class="expediente-estado estado-incompleto">Incompleto</span>
                            @else
                                <span class="expediente-estado estado-sin">Sin estado</span>
                            @endif
                            
                            <div class="expediente-actions">
                                <!-- Ver detalles -->
                                <a href="{{ route('expediente_detalle', ['id' => $expediente->id, 'page' => $expedientes->currentPage()]) }}"
                                   class="action-btn action-btn-primary"
                                   data-bs-toggle="tooltip" title="Ver detalles">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <!-- Editar -->
                                <a href="{{ route('expediente_editar', ['id' => $expediente->id, 'page' => $expedientes->currentPage()]) }}"
                                   class="action-btn action-btn-warning"
                                   data-bs-toggle="tooltip" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <!-- Archivar -->
                                <a href="{{ route('expediente_archivar', ['id' => $expediente->id, 'page' => $expedientes->currentPage()]) }}"
                                   class="action-btn action-btn-info"
                                   data-bs-toggle="tooltip" title="Dar de baja">
                                    <i class="bi bi-folder-x"></i>
                                </a>

                                <!-- Eliminar -->
                                <form action="{{ route('expediente_borrar', $expediente->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="page" value="{{ $expedientes->currentPage() }}">
                                    <button type="submit"
                                            class="action-btn action-btn-danger"
                                            data-bs-toggle="tooltip"
                                            title="Eliminar"
                                            onclick="return confirm('¿Está completamente seguro de eliminar este expediente? Esta acción es irreversible.')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
        
        // Animación para las filas de la tabla
        const rows = document.querySelectorAll('.table-modern tbody tr');
        rows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(20px)';
            row.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, 100 * index);
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