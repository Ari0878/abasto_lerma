<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - Abasto y Comercio</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            background: linear-gradient(135deg, var(--edomex-green), rgb(9, 171, 23));
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

        .stat-card {
            border-left: 5px solid var(--edomex-gold);
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--edomex-green);
        }

        .stat-label {
            font-weight: 500;
            color: #555;
        }

        .chart-container {
            background: white;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="header-gobierno mb-4">
    <div class="container-fluid py-2 px-4 d-flex align-items-center justify-content-between flex-wrap">
        <div class="d-flex align-items-center">
            <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo me-3" />
            <div class="d-none d-md-block">
                <h1 class="h5 mb-0 text-white fw-bold">Sistema de Gestión de Expedientes</h1>
                <small class="text-light">Dirección de Abasto y Comercio</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-dark">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGob" aria-controls="navGob" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navGob">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.welcome') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('expediente') }}">Expediente</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('region') }}">Regiones</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('estadisticas') }}">Estadísticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                    <li class="nav-item dropdown ms-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }} <br> {{auth()->user()->role}}
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

<!-- Contenido -->
<div class="container mb-5">
    <div class="mb-4">
        <h2 class="h4 fw-bold">Estadísticas Generales</h2>
        <p class="text-muted">Indicadores clave de gestión del sistema de abasto y comercio.</p>
        <a href="{{ route('region') }}" class="btn px-4 py-2 rounded-pill d-inline-flex align-items-center shadow"
         data-bs-toggle="tooltip" title="Ir a Regiones">
        <i class="bi bi-globe2 me-2 fs-5"></i>
        <span class="fw-semibold">Ver Regiones</span>
    </a>

    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-value">{{ $total_expedientes ?? 120 }}</div>
                <div class="stat-label">Total de Expedientes</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-value">{{ $regiones_activas ?? 8 }}</div>
                <div class="stat-label">Regiones Activas</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-value">{{ $pendientes ?? 14 }}</div>
                <div class="stat-label">Expedientes Pendientes</div>
            </div>
        </div>
    </div>

    <!-- Gráfico -->
    <div class="chart-container p-4">
        <h5 class="mb-3">Distribución de Expedientes por Región</h5>
        <canvas id="regionChart" height="120"></canvas>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const ctx = document.getElementById('regionChart').getContext('2d');
    const regionChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($nombres_regiones ?? ['Región 1', 'Región 2', 'Región 3']) !!},
            datasets: [{
                label: 'Expedientes',
                data: {!! json_encode($expedientes_por_region ?? [25, 40, 30]) !!},
                backgroundColor: [
                    '#fcff91', '#b983e8', '#e37e08', '#fc9ed0',
                    '#2a68ff', '#ffec04', '#de0505', '#91a5ff'
                ],
                borderColor: '#ffffff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 20,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.formattedValue || 0;
                            return `${label}: ${value}`;
                        }
                    }
                }
            }
        }
    });
</script>

</body>
</html>
