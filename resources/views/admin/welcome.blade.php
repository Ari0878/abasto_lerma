<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Abasto y Comercio | Gobierno del Estado de México</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --edomex-green: rgba(241, 9, 9, 0.68);
            --edomex-green-dark: rgb(224, 10, 10);
            --edomex-green-light: #e8f5e8;
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
            --edomex-gray: #6c757d;
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
            background: var(--gradient-bg);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(23,193,36,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            pointer-events: none;
            z-index: 0;
        }

        .header-gobierno {
            background: var(--gradient-green);
            border-bottom: 4px solid var(--edomex-gold);
            box-shadow: var(--shadow-medium);
            position: relative;
            z-index: 1000;
            overflow: visible; /* Cambiado para permitir que el dropdown se muestre */
        }

        .header-gobierno::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hexagons" width="50" height="43.4" patternUnits="userSpaceOnUse"><polygon points="25,0 50,14.4 50,28.9 25,43.4 0,28.9 0,14.4" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23hexagons)"/></svg>');
            opacity: 0.3;
        }

        .header-content {
            position: relative;
            z-index: 2;
            overflow: visible; /* Asegura que no corte el dropdown */
        }

        .logo {
            height: 70px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .navbar-dark .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
            margin-left: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: var(--edomex-gold);
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }

        .dropdown-menu {
            border: none;
            box-shadow: var(--shadow-medium);
            border-radius: 15px;
            padding: 0.5rem 0;
            backdrop-filter: blur(20px);
            background: rgba(255,255,255,0.95);
            z-index: 2000; /* Aseguramos que esté por encima de otros elementos */
        }

        .dropdown-item {
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border-radius: 10px;
            margin: 0 0.5rem;
        }

        .dropdown-item:hover {
            background: var(--edomex-green-light);
            color: var(--edomex-green-dark);
            transform: translateX(5px);
        }

        .main-content {
            position: relative;
            z-index: 1;
            padding-top: 2rem;
        }

        .hero-section {
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(248,249,250,0.95) 100%);
            backdrop-filter: blur(20px);
            padding: 4rem 2rem;
            border-radius: 25px;
            box-shadow: var(--shadow-heavy);
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(23,193,36,0.1);
            margin-bottom: 3rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(23,193,36,0.05) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            background: var(--gradient-green);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--edomex-gray);
            font-weight: 400;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .user-badge {
            display: inline-flex;
            align-items: center;
            background: var(--gradient-green);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 1rem;
            box-shadow: var(--shadow-light);
        }

        .user-badge i {
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }

        .btn-edomex {
            background: var(--gradient-green);
            color: white;
            font-weight: 600;
            padding: 1rem 2rem;
            border-radius: 50px;
            border: none;
            font-size: 1.1rem;
            box-shadow: var(--shadow-light);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-edomex::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-edomex:hover::before {
            left: 100%;
        }

        .btn-edomex:hover {
            background: linear-gradient(135deg, var(--edomex-green-dark) 0%, var(--edomex-green) 100%);
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
            color: white;
        }

        .search-container {
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(248,249,250,0.95) 100%);
            backdrop-filter: blur(20px);
            padding: 3rem 2rem;
            border-radius: 25px;
            box-shadow: var(--shadow-medium);
            margin-top: 3rem;
            border: 1px solid rgba(23,193,36,0.1);
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
            background: linear-gradient(90deg, var(--edomex-green) 0%, var(--edomex-gold) 100%);
        }

        .search-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
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
            border-radius: 15px;
            padding: 1rem 1.25rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(10px);
        }

        .form-control:focus {
            border-color: var(--edomex-green);
            box-shadow: 0 0 0 0.25rem rgba(23,193,36,0.15);
            background: white;
            transform: translateY(-2px);
        }

        .input-group-text {
            background: var(--gradient-green);
            color: white;
            border: none;
            border-radius: 15px 0 0 15px;
            font-size: 1.2rem;
            padding: 1rem 1.25rem;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-box {
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(248,249,250,0.95) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(23,193,36,0.1);
            padding: 2.5rem 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .feature-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient-green);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .feature-box:hover::before {
            transform: scaleY(1);
        }

        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
            border-color: rgba(23,193,36,0.2);
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
        }

        .feature-box:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: var(--shadow-medium);
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .feature-description {
            color: var(--edomex-gray);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .btn-feature {
            background: transparent;
            color: var(--edomex-green);
            border: 2px solid var(--edomex-green);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-feature:hover {
            background: var(--edomex-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-light);
        }

        .alert {
            border-radius: 15px;
            border: none;
            padding: 1.25rem 1.5rem;
            font-weight: 500;
            box-shadow: var(--shadow-light);
            backdrop-filter: blur(10px);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(248, 215, 218, 0.9) 0%, rgba(245, 194, 199, 0.9) 100%);
            color: #721c24;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(248,249,250,0.9) 100%);
            backdrop-filter: blur(20px);
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            border: 1px solid rgba(23,193,36,0.1);
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--edomex-green);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--edomex-gray);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .fade-in {
            animation: fadeInUp 0.8s ease-out;
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

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-section {
                padding: 2rem 1rem;
                margin-bottom: 2rem;
            }
            
            .search-container {
                padding: 2rem 1rem;
                margin-top: 2rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin-top: 2rem;
            }

            .feature-box {
                padding: 2rem 1.5rem;
            }

            .stats-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .stats-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<header class="header-gobierno">
    <div class="header-content">
        <div class="container-fluid py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center">
                <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo me-3" />
                <div class="d-none d-md-block text-white">
                    <h1 class="h4 mb-1 fw-bold">Sistema de Gestión</h1>
                    <small class="opacity-75">Dirección de Abasto y Comercio</small>
                </div>
            </div>

            <nav class="navbar navbar-expand-md navbar-dark">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGob" aria-controls="navGob" aria-expanded="false" aria-label="Menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navGob">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div class="text-start">
                                        <div class="fw-bold">{{ auth()->user()->name }}</div>
                                        <small class="opacity-75">{{ ucfirst(auth()->user()->role) }}</small>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                        <i class="bi bi-person-gear me-2"></i> Editar perfil
                                    </a>
                                </li>
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

<div class="container main-content">
    <!-- Bienvenida -->
    <section class="hero-section fade-in">
        <div class="hero-content">
            <div class="user-badge">
                <i class="bi bi-person-check"></i>
                Bienvenido, {{ auth()->user()->name }}
            </div>
            
            <h2 class="hero-title">Sistema de Gestión de Expedientes</h2>
            <p class="hero-subtitle">
                @if(auth()->user()->role === 'administrador')
                    Administra, consulta y gestiona las regiones, expedientes y usuarios relacionados con el abasto y comercio en el Municipio de Lerma.
                @else
                    Consulta y gestiona tu expediente relacionado con el abasto y comercio en el Municipio de Lerma de manera rápida y segura.
                @endif
            </p>

            {{-- Estadísticas rápidas --}}
            @if(auth()->user()->role === 'administrador')
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-number">Más de 3000</div>
                        <div class="stat-label">Expedientes</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Regiones</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">Indefinidos</div>
                        <div class="stat-label">Usuarios</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Eficiencia</div>
                    </div>
                </div>

                <a href="{{ route('expediente') }}" class="btn-edomex">
                    <i class="bi bi-folder2-open"></i>
                    Gestionar Expedientes
                </a>
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
        <div class="feature-grid fade-in">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <h5 class="feature-title">Gestión de Regiones</h5>
                <p class="feature-description">Consulta y administra las regiones comerciales registradas en el sistema.</p>
                <a href="{{ route('region') }}" class="btn-feature">
                    <i class="bi bi-arrow-right"></i>
                    Acceder
                </a>
            </div>

            <div class="feature-box">
                <div class="feature-icon">
                    <i class="bi bi-bar-chart-line"></i>
                </div>
                <h5 class="feature-title">Estadísticas y Reportes</h5>
                <p class="feature-description">Visualiza datos e indicadores relevantes para la toma de decisiones estratégicas.</p>
                <a href="{{ route('estadisticas') }}" class="btn-feature">
                    <i class="bi bi-arrow-right"></i>
                    Explorar
                </a>
            </div>

            <div class="feature-box">
                <div class="feature-icon">
                    <i class="bi bi-people"></i>
                </div>
                <h5 class="feature-title">Administración de Usuarios</h5>
                <p class="feature-description">Consulta y gestiona los administradores dados de alta en el sistema.</p>
                <a href="{{ route('users.index') }}" class="btn-feature">
                    <i class="bi bi-arrow-right"></i>
                    Ver Usuarios
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
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.2}s`;
        });

        // Auto-focus en el input de búsqueda si existe
        const searchInput = document.querySelector('input[name="numero_expediente"]');
        if (searchInput) {
            searchInput.focus();
        }
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

    // Efectos de hover mejorados para las tarjetas
    document.querySelectorAll('.feature-box').forEach(box => {
        box.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        box.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

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
            }, 30);
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

    // Efecto de partículas en el fondo (opcional)
    function createParticle() {
        const particle = document.createElement('div');
        particle.style.cssText = `
            position: fixed;
            width: 4px;
            height: 4px;
            background: rgba(23,193,36,0.3);
            border-radius: 50%;
            pointer-events: none;
            animation: particle-float 4s linear infinite;
            left: ${Math.random() * 100}vw;
            top: 100vh;
            z-index: 0;
        `;
        
        const style = document.createElement('style');
        if (!document.querySelector('#particle-style')) {
            style.id = 'particle-style';
            style.textContent = `
                @keyframes particle-float {
                    to {
                        transform: translateY(-100vh) rotate(360deg);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }
        
        document.body.appendChild(particle);
        setTimeout(() => particle.remove(), 4000);
    }

    // Crear partículas ocasionalmente
    setInterval(createParticle, 3000);
</script>

</body>
</html>