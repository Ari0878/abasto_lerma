<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inicio - Abasto y Comercio | Gobierno del Estado de México</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
            overflow-x: hidden;
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

        /* Login button */
        .login-btn {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            background: rgba(255,255,255,0.15);
            border: 2px solid rgba(255,255,255,0.2);
        }

        .login-btn:hover {
            background: rgba(255,255,255,0.25);
            color: var(--edomex-gold);
            transform: translateY(-2px);
        }

        .login-btn i {
            font-size: 1.2rem;
        }

        /* ===== CONTENIDO PRINCIPAL ===== */
        .main-content {
            padding: 3rem 0 5rem;
            position: relative;
            z-index: 1;
        }

        /* Hero section */
        .hero-section {
            background: white;
            border-radius: 16px;
            padding: 3rem 2rem;
            box-shadow: var(--shadow-medium);
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            border-left: 5px solid var(--edomex-green);
            background-image: url('https://www.transparenttextures.com/patterns/concrete-wall-2.png');
            background-blend-mode: overlay;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-green);
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 1.5rem;
            text-align: center;
            position: relative;
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
        }

        .hero-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--gradient-green);
            border-radius: 2px;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--edomex-gray);
            font-weight: 400;
            margin-bottom: 2rem;
            text-align: center;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Stats cards */
        .stats-row {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
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
            text-align: center;
            background-image: url('https://www.transparenttextures.com/patterns/concrete-wall.png');
            background-blend-mode: overlay;
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
        
        .stat-icon {
            font-size: 2.5rem;
            color: var(--edomex-green);
            margin-bottom: 1rem;
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

        /* Search section */
        .search-section {
            background: white;
            border-radius: 16px;
            padding: 3rem 2rem;
            box-shadow: var(--shadow-medium);
            margin-bottom: 2rem;
            border-left: 5px solid var(--edomex-green);
            position: relative;
            background-image: url('https://www.transparenttextures.com/patterns/concrete-wall-2.png');
            background-blend-mode: overlay;
        }

        .search-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-green);
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--gradient-green);
            border-radius: 2px;
        }

        .section-title-icon {
            background: var(--gradient-green);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 10px rgba(233, 9, 9, 0.3);
        }

        /* Form styles */
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 50px;
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
            border-radius: 50px 0 0 50px !important;
            font-size: 1.2rem;
            padding: 1rem 1.5rem;
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
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.7rem;
            transition: all 0.3s ease;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .btn-edomex:hover {
            background: linear-gradient(135deg, var(--edomex-green-dark) 0%, var(--edomex-green) 100%);
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
            color: white;
        }

        .btn-edomex::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-edomex:hover::before {
            left: 100%;
        }

        /* Info cards */
        .info-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
            height: 100%;
            border-left: 3px solid var(--edomex-green);
            background-image: url('https://www.transparenttextures.com/patterns/concrete-wall.png');
            background-blend-mode: overlay;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .info-card-icon {
            font-size: 1.8rem;
            color: var(--edomex-green);
            margin-bottom: 1rem;
            background: var(--edomex-green-light);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .info-card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 0.5rem;
        }

        .info-card-text {
            color: var(--edomex-gray);
            font-size: 0.95rem;
        }

        /* Alert */
        .alert {
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            font-weight: 500;
            box-shadow: var(--shadow-light);
            border: none;
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

        /* Artículo Cards */
        .article-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            border-left: 5px solid var(--edomex-green);
            position: relative;
            overflow: hidden;
            background-image: url('https://www.transparenttextures.com/patterns/concrete-wall-2.png');
            background-blend-mode: overlay;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .article-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-green);
        }

        .article-number {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--edomex-green);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .article-number i {
            font-size: 2rem;
            background: var(--edomex-green-light);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .article-content {
            padding-left: 0.5rem;
            border-left: 3px solid var(--edomex-green-light);
        }

        .article-point {
            margin-bottom: 1rem;
            padding-left: 1rem;
            position: relative;
        }

        .article-point::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.7rem;
            width: 8px;
            height: 8px;
            background: var(--edomex-green);
            border-radius: 50%;
        }

        /* Floating elements */
        .floating-icon {
            position: absolute;
            opacity: 0.1;
            z-index: -1;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Testimonials */
        .testimonial-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--shadow-light);
            position: relative;
            margin: 1rem;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 10px;
            left: 15px;
            font-size: 4rem;
            color: var(--edomex-green-light);
            font-family: Georgia, serif;
            line-height: 1;
            z-index: 0;
        }

        .testimonial-text {
            position: relative;
            z-index: 1;
            font-style: italic;
            margin-bottom: 1rem;
        }

        .testimonial-author {
            font-weight: 600;
            color: var(--edomex-green);
            text-align: right;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 2rem;
            margin: 2rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 7px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--edomex-green-light);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--edomex-green);
            border: 2px solid white;
            box-shadow: 0 0 0 3px var(--edomex-green-light);
        }

        .timeline-date {
            font-weight: 600;
            color: var(--edomex-green);
            margin-bottom: 0.5rem;
        }

        .timeline-content {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: var(--shadow-light);
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
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
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
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .hero-section, .search-section {
                padding: 2rem 1rem;
            }
            
            .btn-edomex {
                padding: 0.8rem 1.5rem;
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.5rem;
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .section-title-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

<!-- Floating decorative elements -->
<i class="bi bi-file-earmark-text floating-icon" style="top: 20%; left: 5%; font-size: 5rem;"></i>
<i class="bi bi-building floating-icon" style="top: 40%; right: 8%; font-size: 4rem;"></i>
<i class="bi bi-shop floating-icon" style="bottom: 30%; left: 10%; font-size: 6rem;"></i>

<!-- Header Mejorado -->
<header class="header-gobierno">
    <div class="container-fluid header-container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo-container">
                <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo" />
                <div class="header-titles d-none d-md-block">
                    <div class="header-title">Sistema de Gestión</div>
                    <div class="header-subtitle">Dirección de Abasto y Comercio</div>
                </div>
            </div>

            <a href="/login" class="login-btn">
                <i class="bi bi-person-circle"></i>
                <span class="d-none d-sm-inline">Iniciar sesión</span>
            </a>
        </div>
    </div>
</header>

<!-- Fondo de onda decorativo -->
<div class="wave-bg"></div>

<!-- Contenido Principal -->
<div class="container main-content">
    <!-- Hero Section -->
    <section class="hero-section animate__animated animate__fadeIn">
        <h1 class="hero-title">Bienvenido al Sistema de Gestión</h1>
        <p class="hero-subtitle">
            Consulta y gestiona tu expediente relacionado con el abasto y comercio en el Municipio de Lerma de manera rápida y segura.
        </p>

        <!-- Estadísticas -->
        <div class="stats-row">
            <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay: 0.1s">
                <i class="bi bi-file-earmark-text stat-icon"></i>
                <div class="stat-value">{{ $total_expedientes ?? '1,000' }}</div>
                <div class="stat-label">Expedientes Activos</div>
            </div>
            <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay: 0.2s">
                <i class="bi bi-clock-history stat-icon"></i>
                <div class="stat-value">24/7</div>
                <div class="stat-label">Disponibilidad</div>
            </div>
            <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay: 0.3s">
                <i class="bi bi-shield-check stat-icon"></i>
                <div class="stat-value">100%</div>
                <div class="stat-label">Seguro</div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section animate__animated animate__fadeIn" style="animation-delay: 0.2s">
        <h3 class="section-title">
            <span class="section-title-icon">
                <i class="bi bi-search"></i>
            </span>
            Buscar mi Expediente
        </h3>
        
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
                        Ejemplo: 001234
                    </small>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-edomex w-100">
                        <i class="bi bi-search me-1"></i> 
                        Buscar Expediente
                    </button>
                </div>
            </div>
        </form>

        @if(session('error'))
            <div class="alert alert-danger mt-4">
                <i class="bi bi-exclamation-triangle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Información adicional -->
        <div class="row mt-4 g-4">
            <div class="col-md-6">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="bi bi-question-circle"></i>
                    </div>
                    <h5 class="info-card-title">¿No encuentras tu expediente?</h5>
                    <p class="info-card-text">Contacta a nuestro equipo de soporte para obtener ayuda personalizada.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h5 class="info-card-title">Soporte Técnico</h5>
                    <p class="info-card-text">
                        Lunes a Viernes de 9:00 AM a 6:00 PM<br>
                        Tel: (728) 282-9903 ext: Abasto y Comercio 1109
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5 class="info-card-title">Coordinador de Abasto y Comercio</h5>
                    <p class="info-card-text">
                        Juan Alberto Pilar Felipe<br>
                        Tel: 55 86401 583
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h5 class="info-card-title">Horario de Atención</h5>
                    <p class="info-card-text">
                        Lunes a Viernes<br>
                        9:00 AM - 6:00 PM
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Información General Section -->
    <section class="search-section animate__animated animate__fadeIn" style="animation-delay: 0.3s">
        <h3 class="section-title">
            <span class="section-title-icon">
                <i class="bi bi-info-circle"></i>
            </span>
            Información General
        </h3>
        
        <p class="hero-subtitle text-center mb-4">
            Conoce la principal información sobre la coordinación de Abasto y Comercio
        </p>

        <div class="row">
            <!-- Artículo 6 -->
            <div class="col-md-12">
                <div class="article-card">
                    <div class="article-number">
                        <i class="bi bi-file-earmark-text"></i>
                        Artículo 6
                    </div>
                    <div class="article-content">
                        <p>En el ámbito de sus atribuciones, es facultad del Presidente Municipal a través
                        de la Dirección de Desarrollo Económico, la Subdirección de Desarrollo Industrial y la
                        Subdirección de Abasto y Comercio: determinar los giros o actividades a los que puede
                        expedirse licencia, autorización, cédula o permiso municipal de funcionamiento anual o
                        temporal.</p>
                    </div>
                </div>
            </div>

            <!-- Artículo 18 -->
            <div class="col-md-12">
                <div class="article-card">
                    <div class="article-number">
                        <i class="bi bi-file-earmark-text"></i>
                        Artículo 18
                    </div>
                    <div class="article-content">
                        <p>La vigencia de las Cédulas, permisos y autorizaciones para el uso de la
                        vía pública y lugares de uso común será determinada por la Subdirección de Abasto y
                        Comercio, de la manera siguiente:</p>
                        
                        <div class="article-point">
                            <strong>1. Autorizaciones:</strong> Permiten el uso de la vía pública o lugares de uso común
                            por periodos menores a 90 días naturales.
                        </div>
                        
                        <div class="article-point">
                            <strong>2. Permisos:</strong> Autorizan el uso de la vía pública por periodos mayores a
                            noventa días naturales y menores a un año.
                        </div>
                        
                        <div class="article-point">
                            <strong>3. Cédulas:</strong> Autorizan el uso de la vía pública o lugares de uso común por
                            periodos de un año calendario. Siendo posible su renovación, durante los tres
                            primeros meses de cada año y si subsisten las condiciones que motivaron su
                            expedición; en caso de no solicitar su renovación en el periodo descrito se
                            procederá a su cancelación.
                        </div>
                        
                        <div class="article-point">
                            <strong>4. Vigencia:</strong> El periodo o vigencia deberá asentarse en el documento que lo autorice.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Artículo 23 -->
            <div class="col-md-12">
                <div class="article-card">
                    <div class="article-number">
                        <i class="bi bi-file-earmark-text"></i>
                        Artículo 23
                    </div>
                    <div class="article-content">
                        <p>La Subdirección de Abasto y Comercio expedirá Licencias de
                        Funcionamiento, permiso, a unidades económicas de tipo establecimiento de bajo
                        impacto, mediano impacto y alto impacto; a la actividad de personas físicas, mediante el
                        cumplimiento de los requisitos establecidos en el presente reglamento.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <!--<section class="search-section animate__animated animate__fadeIn" style="animation-delay: 0.4s">-->
    <!--    <h3 class="section-title">-->
    <!--        <span class="section-title-icon">-->
    <!--            <i class="bi bi-chat-square-quote"></i>-->
    <!--        </span>-->
    <!--        Testimonios-->
    <!--    </h3>-->
        
    <!--    <div class="row">-->
            <!--<div class="col-md-4">-->
            <!--    <div class="testimonial-card">-->
            <!--        <p class="testimonial-text">El proceso de obtención de mi permiso fue rápido y eficiente. El personal fue muy amable y profesional.</p>-->
            <!--        <p class="testimonial-author">- María González</p>-->
            <!--    </div>-->
            <!--</div>-->
    <!--        <div class="col-md-4">-->
    <!--            <div class="testimonial-card">-->
    <!--                <p class="testimonial-text">Excelente servicio en línea, pude consultar mi expediente sin necesidad de ir a las oficinas.</p>-->
    <!--                <p class="testimonial-author">- Juan Pérez</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-md-4">-->
    <!--            <div class="testimonial-card">-->
    <!--                <p class="testimonial-text">La información está clara y el sistema es fácil de usar. Muy satisfecho con el servicio.</p>-->
    <!--                <p class="testimonial-author">- Roberto Sánchez</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- Process Timeline -->
    <section class="search-section animate__animated animate__fadeIn" style="animation-delay: 0.5s">
        <h3 class="section-title">
            <span class="section-title-icon">
                <i class="bi bi-list-check"></i>
            </span>
            Proceso de Solicitud
        </h3>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-date">Paso 1</div>
                <div class="timeline-content">
                    Presentar solicitud completa con documentos requeridos
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">Paso 2</div>
                <div class="timeline-content">
                    Revisión de documentos en modulo o el coordinación de Abasto y comercio
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">Paso 3</div>
                <div class="timeline-content">
                    Realizar pago en cajas 
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">Paso 4</div>
                <div class="timeline-content">
                    Emisión del documento correspondiente
                </div>
            </div>

            </div>
        </div>
    </section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Mejorar experiencia del formulario
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[name="numero_expediente"]');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                // Convertir a mayúsculas automáticamente
                e.target.value = e.target.value.toUpperCase();
                
                // Validación visual en tiempo real
                const isValid = e.target.value.length >= 3;
                const submitBtn = document.querySelector('.btn-edomex');
                
                if (isValid) {
                    e.target.classList.remove('is-invalid');
                    e.target.classList.add('is-valid');
                    submitBtn.disabled = false;
                } else {
                    e.target.classList.remove('is-valid');
                    submitBtn.disabled = e.target.value.length === 0;
                }
            });
        }

        // Animaciones al hacer scroll
        const animateOnScroll = function() {
            const elements = document.querySelectorAll('.search-section, .article-card');
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (elementPosition < screenPosition) {
                    element.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        };

        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll(); // Ejecutar al cargar la página
    });

    // Prevenir cache en navegación
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>

</body>
</html>