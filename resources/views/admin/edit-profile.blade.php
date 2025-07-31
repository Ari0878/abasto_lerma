<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Perfil - Abasto y Comercio | Gobierno del Estado de México</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
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
            background: white;
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
            box-shadow: var(--shadow-light);
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-edomex:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
            color: white;
            background: var(--edomex-green-dark);
        }

        .btn-edomex-outline {
            border: 2px solid var(--edomex-green);
            color: var(--edomex-green);
            background: white;
            font-weight: 600;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            box-shadow: var(--shadow-light);
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            transition: all 0.3s ease;
        }

        .btn-edomex-outline:hover {
            background: var(--edomex-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        /* Formulario mejorado */
        .form-control {
            border-radius: 8px;
            padding: 0.8rem 1rem;
            border: 1px solid rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--edomex-green);
            box-shadow: 0 0 0 0.25rem rgba(224, 10, 10, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: var(--edomex-green-dark);
            margin-bottom: 0.5rem;
        }

        /* Alertas */
        .alert {
            border-radius: 8px;
            border-left: 4px solid;
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

        /* Navbar de usuario */
        .user-nav {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--edomex-green);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .user-info {
            color: white;
            line-height: 1.2;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .user-role {
            font-size: 0.75rem;
            opacity: 0.9;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .header-container {
                padding: 0.5rem 1rem;
            }
        }

        @media (max-width: 768px) {
            .card-title-modern {
                font-size: 1.2rem;
            }
            
            .btn-edomex, .btn-edomex-outline {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
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
            
            .form-control {
                padding: 0.6rem;
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
                    <div class="header-title">Sistema de Gestión</div>
                    <div class="header-subtitle">Dirección de Abasto y Comercio</div>
                </div>
            </div>

            <nav class="navbar navbar-expand-md navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGob" aria-controls="navGob" aria-expanded="false" aria-label="Menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navGob">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-nav">
                                    <div class="user-avatar">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <div class="user-info d-none d-md-block">
                                        <div class="user-name">{{ auth()->user()->name }}</div>
                                        <div class="user-role">{{ ucfirst(auth()->user()->role) }}</div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
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
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Tarjeta contenedora -->
            <div class="card card-modern mb-4">
                <div class="card-header-modern">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="card-title-modern">
                            <i class="bi bi-person-gear"></i>
                            Editar Perfil
                        </h2>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any()))
                        <div class="alert alert-danger mb-4">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error))
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                            <div class="invalid-feedback">
                                Por favor ingresa tu nombre.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            <div class="invalid-feedback">
                                Por favor ingresa un correo electrónico válido.
                            </div>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3 text-muted">Cambiar contraseña</h5>
                        <p class="text-muted small mb-4">Deja estos campos en blanco si no deseas cambiar la contraseña.</p>

                        <div class="mb-4">
                            <label for="current_password" class="form-label">Contraseña actual</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <div class="form-text small">Necesaria para confirmar cambios en la contraseña.</div>
                        </div>

                        <div class="mb-4">
                            <label for="new_password" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                            <div class="form-text small">Mínimo 8 caracteres.</div>
                        </div>

                        <div class="mb-4">
                            <label for="new_password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{ auth()->user()->role === 'usuario' ? route('usuario.welcome') : route('dashboard') }}" class="btn btn-edomex-outline">
                                <i class="bi bi-arrow-left me-1"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-edomex">
                                <i class="bi bi-save me-1"></i> Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Validación de formulario
    (function () {
        'use strict'
        
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
        
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated')
                }, false)
            })
    })()
    
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
</body>
</html>