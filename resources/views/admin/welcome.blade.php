<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Abasto y Comercio | Gobierno del Estado de México</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
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

        /* Sección Hero mejorada */
        .hero-section {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-medium);
            padding: 3rem 2rem;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            border: none;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path fill="%23e00a0a" d="M30,10L50,30L70,10L90,30L70,50L90,70L70,90L50,70L30,90L10,70L30,50L10,30L30,10Z"/></svg>');
            background-size: cover;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            margin: 0 auto;
        }

        .user-badge {
            display: inline-flex;
            align-items: center;
            background: var(--gradient-green);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-light);
            border: 2px solid rgba(255,255,255,0.3);
        }

        .user-badge i {
            margin-right: 0.7rem;
            font-size: 1.3rem;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--edomex-green-dark);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--edomex-gray);
            font-weight: 400;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        /* Tarjetas de estadísticas mejoradas - NUEVO ESTILO */
        .stats-container {
            display: flex;
            justify-content: center;
            margin: 2.5rem 0;
        }

        .stats-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            max-width: 1200px;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: var(--shadow-light);
            border-top: 4px solid var(--edomex-green);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            width: 200px;
            flex: 0 0 auto;
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
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path fill="%23e00a0a" d="M30,10L50,30L70,10L90,30L70,50L90,70L70,90L50,70L30,90L10,70L30,50L10,30L30,10Z"/></svg>');
            background-size: 200px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--edomex-green);
            margin-bottom: 0.5rem;
            position: relative;
        }

        .stat-label {
            color: var(--edomex-gray);
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
        }

        /* Botón principal mejorado */
        .btn-edomex {
            background: var(--gradient-green);
            color: white;
            font-weight: 600;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            border: none;
            font-size: 1.1rem;
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

        .btn-edomex i {
            font-size: 1.2rem;
        }

        /* Sección de búsqueda mejorada */
        .search-container {
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-medium);
            margin-top: 2rem;
            position: relative;
            overflow: hidden;
        }

        .search-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-green);
        }

        .search-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .search-icon-bg {
            background: var(--gradient-green);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: var(--shadow-light);
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--edomex-green);
            box-shadow: 0 0 0 0.25rem rgba(224, 10, 10, 0.15);
        }

        .input-group-text {
            background: var(--gradient-green);
            color: white;
            border: none;
            border-radius: 12px 0 0 12px;
            font-size: 1.2rem;
            padding: 1rem 1.5rem;
        }

        /* Grid de características mejorado */
            .feature-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 2rem;
                margin-top: 3rem;
                justify-content: center; /* Esto centrará el grid completo */
                width: 100%;
            }

            .feature-box {
                background: white;
                padding: 2rem 1.8rem;
                border-radius: 16px;
                box-shadow: var(--shadow-light);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                text-align: center;
                border-top: 4px solid var(--edomex-green);
                max-width: 350px;
                width: 100%;
                margin: 0 auto; /* Centrado horizontal cuando sea necesario */
            }

        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
            border: 3px solid rgba(255,255,255,0.3);
        }

        .feature-box:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: var(--shadow-medium);
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 1rem;
        }

        .feature-description {
            color: var(--edomex-gray);
            margin-bottom: 1.5rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .btn-feature {
            background: transparent;
            color: var(--edomex-green);
            border: 2px solid var(--edomex-green);
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 0.95rem;
        }

        .btn-feature:hover {
            background: var(--edomex-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-light);
        }

        /* Alertas mejoradas */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1.2rem 1.5rem;
            font-weight: 500;
            box-shadow: var(--shadow-light);
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        /* Animaciones */
        .fade-in {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-section {
                padding: 2.5rem 1.5rem;
            }
            
            .search-container {
                padding: 2rem 1.5rem;
            }

            .stat-card {
                width: 180px;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .stat-card {
                width: 160px;
                padding: 1.2rem;
            }
            
    .feature-grid {
        grid-template-columns: minmax(280px, 350px); /* Fuerza una sola columna */
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
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .stat-card {
                width: 140px;
                padding: 1rem;
            }
            
            .stat-number {
                font-size: 2rem;
            }
            
            .search-title {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .stats-row {
                gap: 1rem;
            }
            
            .stat-card {
                width: 100%;
                max-width: 180px;
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
                                @if(auth()->user()->role !== 'administrador')
                                    <li>
                                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                            <i class="bi bi-person-gear me-2"></i> Editar perfil
                                        </a>
                                    </li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
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
    <!-- Sección de Bienvenida -->
    <section class="hero-section fade-in">
        <div class="hero-content">
            <div class="user-badge fade-in" style="animation-delay: 0.1s">
                <i class="bi bi-person-check"></i>
                Bienvenido, {{ auth()->user()->name }}
            </div>
            
            <h1 class="hero-title fade-in" style="animation-delay: 0.2s">Sistema de Gestión de Expedientes</h1>
            <p class="hero-subtitle fade-in" style="animation-delay: 0.3s">
                @if(auth()->user()->role === 'administrador')
                    Administra, consulta y gestiona las regiones, expedientes y usuarios relacionados con el abasto y comercio en el Municipio de Lerma.
                @else
                    Consulta y gestiona tu expediente relacionado con el abasto y comercio en el Municipio de Lerma de manera rápida y segura.
                @endif
            </p>

            {{-- Estadísticas rápidas --}}
            @if(auth()->user()->role === 'administrador')
                <div class="stats-container">
                    <div class="stats-row">
                        <div class="stat-card fade-in" style="animation-delay: 0.4s">
                            <div class="stat-number">{{ $expedientes->count() }}</div>
                            <div class="stat-label">Expedientes</div>
                        </div>
                        <div class="stat-card fade-in" style="animation-delay: 0.5s">
                            <div class="stat-number">8</div>
                            <div class="stat-label">Regiones</div>
                        </div>
                        <div class="stat-card fade-in" style="animation-delay: 0.6s">
                            <div class="stat-number">{{ $usuarios->count() }}</div>
                            <div class="stat-label">Usuarios</div>
                        </div>
                        <div class="stat-card fade-in" style="animation-delay: 0.7s">
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Eficiencia</div>
                        </div>
                        <div class="stat-card fade-in" style="animation-delay: 0.75s">
                            <div class="stat-number">{{ $visitas->count() }}</div>
                            <div class="stat-label">Visitas Registradas</div>
                            <i class="bi bi-person-lines-fill position-absolute bottom-0 end-0 text-danger opacity-10 pe-3 pb-2" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>

                <div class="text-center fade-in" style="animation-delay: 0.8s">
                    <a href="{{ route('expediente') }}" class="btn-edomex">
                        <i class="bi bi-folder2-open"></i>
                        Gestionar Expedientes
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Búsqueda para usuarios regulares --}}
    @if(auth()->user()->role !== 'administrador')
        <section class="search-container fade-in">
            <h4 class="search-title">
                <span class="search-icon-bg">
                    <i class="bi bi-search"></i>
                </span>
                Buscar mi Expediente
            </h4>
            
            <form action="{{ route('expediente.search') }}" method="GET" class="mb-4">
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-lg-8">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-file-earmark-text"></i>
                            </span>
                            <input type="text" 
                                   class="form-control" 
                                   name="numero_expediente" 
                                   placeholder="Ingrese el número de folio del expediente" 
                                   required
                                   autocomplete="off">
                        </div>
                        <small class="text-muted mt-2 d-block">
                            <i class="bi bi-info-circle me-1"></i>
                            Ejemplo: 00791
                        </small>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-edomex w-100">
                            <i class="bi bi-search"></i>
                            Buscar Expediente
                        </button>
                    </div>
                </div>
            </form>

            @if(session('error'))
                <div class="alert alert-danger mt-4 fade-in">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                </div>
            @endif
        </section>
    @endif

    {{-- Funcionalidades para administrador --}}
    @if(auth()->user()->role === 'administrador')
        <div class="feature-grid">
            <div class="feature-box fade-in" style="animation-delay: 0.3s">
                <div class="feature-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <h5 class="feature-title">Gestión de Regiones</h5>
                <p class="feature-description">Consulta y administra las regiones comerciales registradas en el sistema con información detallada y actualizada.</p>
                <a href="{{ route('region') }}" class="btn-feature">
                    <i class="bi bi-arrow-right"></i>
                    Acceder a Regiones
                </a>
            </div>

            <div class="feature-box fade-in" style="animation-delay: 0.4s">
                <div class="feature-icon">
                    <i class="bi bi-bar-chart-line"></i>
                </div>
                <h5 class="feature-title">Estadísticas y Reportes</h5>
                <p class="feature-description">Visualiza datos e indicadores relevantes para la toma de decisiones estratégicas con gráficos interactivos.</p>
                <a href="{{ route('estadisticas') }}" class="btn-feature">
                    <i class="bi bi-arrow-right"></i>
                    Ver Estadísticas
                </a>
            </div>

            <div class="feature-box fade-in" style="animation-delay: 0.5s">
                <div class="feature-icon">
                    <i class="bi bi-people"></i>
                </div>
                <h5 class="feature-title">Administración de Usuarios</h5>
                <p class="feature-description">Gestiona los usuarios del sistema con permisos diferenciados según sus roles y responsabilidades.</p>
                <a href="{{ route('users.index') }}" class="btn-feature">
                    <i class="bi bi-arrow-right"></i>
                    Administrar Usuarios
                </a>
            </div>
            
            <div class="feature-box fade-in" style="animation-delay: 0.6s">
                <div class="feature-icon">
                    <i class="bi bi-cash-stack"></i>
                </div>
                <h5 class="feature-title">Gestión de Ingresos</h5>
                <p class="feature-description">Consulta y administra los ingresos registrados en el sistema con reportes detallados por períodos.</p>
                <a href="{{ route('ingresos.index') }}" class="btn-feature">
                    <i class="bi bi-arrow-right"></i>
                    Ver Ingresos
                </a>
            </div>
            <div class="feature-box fade-in" style="animation-delay: 0.7s">
                <div class="feature-icon">
                    <i class="bi bi-clipboard-check"></i>
                </div>
                <h5 class="feature-title">Control de Visitas</h5>
                <p class="feature-description">Consulta y gestiona los registros de visitas realizadas a los comercios y puntos de abasto en el municipio.</p>
                <a href="{{ route('visitas.index') }}" class="btn-feature">
                    <i class="bi bi-arrow-right"></i>
                    Ver Visitas
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Animaciones de entrada
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-focus en el input de búsqueda si existe
        const searchInput = document.querySelector('input[name="numero_expediente"]');
        if (searchInput) {
            searchInput.focus();
        }

        // Efecto de hover mejorado para las tarjetas
        document.querySelectorAll('.feature-box').forEach(box => {
            box.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            box.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

    // Prevenir cache en navegación
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

    // Mejorar experiencia del formulario de búsqueda
    const searchInput = document.querySelector('input[name="numero_expediente"]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            // Convertir a mayúsculas automáticamente
            e.target.value = e.target.value.toUpperCase();
            
            // Validación visual en tiempo real
            const isValid = e.target.value.length >= 3;
            const submitBtn = document.querySelector('.btn-edomex[type="submit"]');
            
            if (isValid) {
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
                if (submitBtn) submitBtn.disabled = false;
            } else {
                e.target.classList.remove('is-valid');
                if (submitBtn) submitBtn.disabled = e.target.value.length === 0;
            }
        });
    }

    // Animación de contadores para las estadísticas
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number');
        counters.forEach(counter => {
            const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
            const increment = target / 50;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = counter.textContent.replace(/\d+/, target);
                    clearInterval(timer);
                } else {
                    counter.textContent = counter.textContent.replace(/\d+/, Math.floor(current));
                }
            }, 20);
        });
    }

    // Ejecutar animación de contadores cuando sea visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    });

    const statsRow = document.querySelector('.stats-row');
    if (statsRow) {
        observer.observe(statsRow);
    }
</script>

</body>
</html>