<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Estadísticas - Abasto y Comercio</title>

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

        /* Estadísticas cards */
        .stats-row {
            display: flex;
            gap: 1.5rem;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }
        
        .stat-card {
            flex: 1 1 30%;
            min-width: 250px;
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--shadow-light);
            border-left: 5px solid var(--edomex-green);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-green);
        }
        
        .stat-value {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--edomex-green);
            margin-bottom: 0.5rem;
            line-height: 1;
        }
        
        .stat-label {
            font-size: 1rem;
            font-weight: 600;
            color: var(--edomex-gray);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Gráficos */
        .chart-container {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: var(--shadow-light);
            margin-bottom: 2rem;
        }
        
        .chart-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .chart-title i {
            font-size: 1.5rem;
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

        /* Responsive */
        @media (max-width: 992px) {
            .header-container {
                padding: 0.5rem 1rem;
            }
            
            .stat-card {
                flex: 1 1 45%;
            }
        }

        @media (max-width: 768px) {
            .stat-card {
                flex: 1 1 100%;
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
                        <li class="nav-item"><a class="nav-link active" href="{{ route('estadisticas') }}"><i class="bi bi-bar-chart"></i> Estadísticas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i class="bi bi-people"></i> Usuarios</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ingresos.index') }}"><i class="bi bi-cash-stack"></i> Ingresos</a></li>
                        
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>
                                <span class="d-none d-lg-inline">{{ auth()->user()->name }}</span>
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
                    <i class="bi bi-bar-chart-fill"></i>
                    Estadísticas Generales
                </h2>
                <a href="{{ route('region') }}" class="btn-edomex">
                    <i class="bi bi-globe2 me-1"></i> Ver Regiones
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

            <!-- Tarjetas de estadísticas -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-value">{{ $total_expedientes ?? 120 }}</div>
                    <div class="stat-label">Total de Expedientes</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $regiones_activas ?? 8 }}</div>
                    <div class="stat-label">Regiones Activas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $pendientes ?? 14 }}</div>
                    <div class="stat-label">Expedientes Pendientes</div>
                </div>
            </div>

            <!-- Gráfico de distribución por región -->
            <div class="chart-container">
                <h5 class="chart-title"><i class="bi bi-pie-chart-fill"></i> Distribución de Expedientes por Región</h5>
                <canvas id="regionChart" height="130"></canvas>
            </div>
            
        </div>
    </div>
</div>

<!-- Bootstrap JS + Tooltip Init -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Inicializar tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl, { trigger: 'hover' });
        });
    });
    
    // Gráfico de regiones
    const ctx = document.getElementById('regionChart').getContext('2d');
    const regionChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($nombres_regiones ?? ['Región 1', 'Región 2', 'Región 3']) !!},
            datasets: [{
                label: 'Expedientes',
                data: {!! json_encode($expedientes_por_region ?? [25, 40, 30]) !!},
                backgroundColor: [
                    '#fcff91',
                    '#b983e8',
                    '#e37e08',
                    '#fc9ed0',
                    '#2a68ff',
                    '#ffec04',
                    '#de0505',
                    '#91a5ff',
                ],
                borderColor: '#fff',
                borderWidth: 2,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 20,
                        padding: 15,
                        font: { weight: '600', size: 14 },
                        color: '#333',
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
    
    
    
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
</body>
</html>