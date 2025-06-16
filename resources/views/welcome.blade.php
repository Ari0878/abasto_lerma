<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inicio - Abasto y Comercio | Gobierno del Estado de México</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --edomex-green:rgba(241, 9, 9, 0.68);
            --edomex-green-dark:rgb(224, 10, 10);
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
            --edomex-gray: #6c757d;
            --shadow-light: 0 2px 15px rgba(0,0,0,0.08);
            --shadow-medium: 0 8px 30px rgba(0,0,0,0.12);
            --shadow-heavy: 0 15px 50px rgba(0,0,0,0.15);
        }

        * {
            transition: all 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
        }

        .header-gobierno {
            background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
            border-bottom: 4px solid var(--edomex-gold);
            box-shadow: var(--shadow-medium);
            position: relative;
            overflow: hidden;
        }

        .header-gobierno::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            height: 70px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .login-icon {
            color: white;
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0.5rem;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }

        .login-icon:hover {
            color: var(--edomex-gold);
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .hero-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 4rem 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow-heavy);
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-top: 2rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(23,193,36,0.05) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
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
            background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--edomex-gray);
            font-weight: 400;
            margin-bottom: 2rem;
        }

        .search-container {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 3rem 2rem;
            border-radius: 20px;
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
            background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
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
            background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
            color: white;
            border: none;
            border-radius: 15px 0 0 15px;
            font-size: 1.2rem;
            padding: 1rem 1.25rem;
        }

        .btn-edomex {
            background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
            color: white;
            font-weight: 600;
            padding: 1rem 2rem;
            border-radius: 15px;
            border: none;
            font-size: 1.1rem;
            box-shadow: var(--shadow-light);
            position: relative;
            overflow: hidden;
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
        }

        .alert {
            border-radius: 15px;
            border: none;
            padding: 1.25rem 1.5rem;
            font-weight: 500;
            box-shadow: var(--shadow-light);
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c2c7 100%);
            color: #721c24;
        }

        .stats-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow-light);
            border: 1px solid rgba(23,193,36,0.1);
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .stats-icon {
            font-size: 3rem;
            color: var(--edomex-green);
            margin-bottom: 1rem;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--edomex-gray);
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-section {
                padding: 2rem 1rem;
                margin-top: 1rem;
            }
            
            .search-container {
                padding: 2rem 1rem;
                margin-top: 2rem;
            }
            
            .login-icon {
                font-size: 1.5rem;
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<header class="header-gobierno mb-4">
    <div class="header-content">
        <div class="container-fluid py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center">
                <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo me-3" />
                <div class="d-none d-md-block text-white">
                    <h1 class="h4 mb-1 fw-bold">Sistema de Gestión</h1>
                    <small class="opacity-75">Dirección de Abasto y Comercio</small>
                </div>
            </div>

            <!-- Icono para iniciar sesión -->
            <a href="/login" title="Iniciar sesión" aria-label="Iniciar sesión" class="text-decoration-none">
                <i class="bi bi-person-circle login-icon"></i>
            </a>
        </div>
    </div>
</header>

<div class="container">
    <!-- Bienvenida -->
    <section class="hero-section fade-in">
        <div class="hero-content">
            <h2 class="hero-title">Bienvenido al Sistema de Gestión</h2>
            <p class="hero-subtitle">Consulta y gestiona tu expediente relacionado con el abasto y comercio en el Municipio de Lerma de manera rápida y segura.</p>

            <!-- Estadísticas rápidas -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="stats-card">
                        <i class="bi bi-file-earmark-text stats-icon"></i>
                        <div class="stats-number">1,247</div>
                        <div class="stats-label">Expedientes Activos</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <i class="bi bi-clock-history stats-icon"></i>
                        <div class="stats-number">24/7</div>
                        <div class="stats-label">Disponibilidad</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <i class="bi bi-shield-check stats-icon"></i>
                        <div class="stats-number">100%</div>
                        <div class="stats-label">Seguro</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Búsqueda -->
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
                        Ejemplo: EXP-2024-001234
                    </small>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-edomex w-100">
                        <i class="bi bi-search me-2"></i> 
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

        <!-- Información adicional -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start">
                    <i class="bi bi-question-circle text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                    <div>
                        <h6 class="fw-bold mb-2">¿No encuentras tu expediente?</h6>
                        <p class="text-muted mb-0">Contacta a nuestro equipo de soporte para obtener ayuda personalizada.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start">
                    <i class="bi bi-telephone text-success me-3 mt-1" style="font-size: 1.5rem;"></i>
                    <div>
                        <h6 class="fw-bold mb-2">Soporte Técnico</h6>
                        <p class="text-muted mb-0">Lunes a Viernes de 8:00 AM a 6:00 PM<br>Tel: (722) 123-4567</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Animación de entrada
    document.addEventListener('DOMContentLoaded', function() {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.2}s`;
        });
    });

    // Prevenir cache en navegación
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

    // Mejorar experiencia del formulario
    document.querySelector('input[name="numero_expediente"]').addEventListener('input', function(e) {
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

    // Efecto de partículas en el header (opcional)
    function createParticle() {
        const header = document.querySelector('.header-gobierno');
        const particle = document.createElement('div');
        particle.style.cssText = `
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255,215,0,0.6);
            border-radius: 50%;
            pointer-events: none;
            animation: particle-float 3s linear infinite;
            left: ${Math.random() * 100}%;
            top: 100%;
        `;
        
        const style = document.createElement('style');
        style.textContent = `
            @keyframes particle-float {
                to {
                    transform: translateY(-100px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
        
        header.appendChild(particle);
        setTimeout(() => particle.remove(), 3000);
    }

    // Crear partículas ocasionalmente
    setInterval(createParticle, 2000);
</script>

</body>
</html>