<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regiones - Gobierno del Estado de México</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
         background: linear-gradient(135deg, var(--edomex-green) 0%, rgb(241, 9, 9)100%);  /* Verde institucional */
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
            background: linear-gradient(135deg, var(--edomex-green) 0%,rgba(241, 9, 9, 0.68) 100%);
            color: white;
            padding: 1rem 0;
            border-bottom: 5px solid var(--edomex-gold);
        } */

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

        .card-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: none;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin: 0 2px;
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
                    <h2 class="h5 mb-0 text-primary">Regiones Registradas</h2>
                    <small class="text-muted">Gestión territorial del Estado</small>
                </div>
                <a href="{{ route('region_alta') }}" class="btn btn-edomex">
                    <i class="bi bi-plus-lg me-1"></i> Nueva Región
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
                <table class="table table-hover table-bordered mb-0">
                    <thead class="table-header">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Número de Región</th>
                            <th>Nombre</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($regiones as $region)
                        <tr>
                            <td class="text-center">{{ $region->id }}</td>
                            <td>{{ $region->numero_region }}</td>
                            <td>{{ $region->nombre }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('region_detalle', ['id' => $region->id]) }}"
                                       class="btn btn-sm btn-outline-primary action-btn"
                                       data-bs-toggle="tooltip" title="Ver detalles">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('region_editar', ['id' => $region->id]) }}"
                                       class="btn btn-sm btn-outline-warning action-btn"
                                       data-bs-toggle="tooltip" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('region_borrar', ['id' => $region->id]) }}"
                                       class="btn btn-sm btn-outline-danger action-btn"
                                       onclick="return confirm('¿Está seguro de eliminar esta región?')"
                                       data-bs-toggle="tooltip" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS + Tooltip Init -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
</body>
</html>
