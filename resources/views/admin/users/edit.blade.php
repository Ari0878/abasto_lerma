<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <!-- Icono en la pestaña del navegador -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    
    <!-- Responsive para dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>Editar Administrador - Abasto y Comercio</title>

    <!-- Carga de CSS de Bootstrap y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    
    <!-- Fuente desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Variables CSS para colores, sombras y gradientes */
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

        /* Transición suave para todos los elementos */
        * {
            transition: all 0.3s ease;
        }

        /* Estilos básicos del body */
        body {
            background: var(--edomex-light);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
            color: #333;
        }

        /* ===== ESTILOS DEL HEADER ===== */
        .header-gobierno {
            background: var(--gradient-green); /* Fondo degradado rojo */
            border-bottom: 4px solid var(--edomex-gold); /* Línea dorada en la parte inferior */
            box-shadow: var(--shadow-medium); /* Sombra */
            position: sticky; /* Queda fijo al hacer scroll */
            top: 0;
            z-index: 1030; /* Por encima de otros elementos */
        }

        .header-container {
            padding: 0.5rem 2rem;
        }

        /* Contenedor del logo y títulos */
        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem; /* Separación entre logo y texto */
        }

        /* Logo */
        .logo {
            height: 60px;
            filter: brightness(0) invert(1); /* Ajusta colores para que el logo se vea en blanco */
            transition: transform 0.3s ease; /* Animación suave */
        }

        .logo:hover {
            transform: scale(1.05); /* Efecto zoom al pasar mouse */
        }

        /* Textos del header */
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

        /* Estilos de la tarjeta principal */
        .card-modern {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-medium);
            overflow: hidden;
        }

        /* Encabezado de la tarjeta */
        .card-header-modern {
            background: white;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: relative;
        }

        /* Línea decorativa debajo del header */
        .card-header-modern::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-green);
        }

        /* Título de la tarjeta */
        .card-title-modern {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        /* Estilos para botón personalizado */
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

        /* Botón con estilo outline */
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

        /* Estilos para etiquetas y campos del formulario */
        .form-label {
            font-weight: 500;
            color: var(--edomex-green-dark);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.6rem 1rem;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--edomex-green);
            box-shadow: 0 0 0 0.25rem rgba(224, 10, 10, 0.25);
        }
        
        /* Estilos para alertas */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 500;
            box-shadow: var(--shadow-light);
        }

        /* Fondo decorativo con efecto de ondas SVG */
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
            pointer-events: none; /* Para que no interfiera con clics */
        }

        /* Responsive para tablets y móviles */
        @media (max-width: 992px) {
            .header-container {
                padding: 0.5rem 1rem;
            }
        }

        @media (max-width: 768px) {
            .card-title-modern {
                font-size: 1.2rem;
            }
            
            .btn-edomex {
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
        }
    </style>
</head>
<body>

<!-- Header Mejorado con logo y texto -->
<header class="header-gobierno">
    <div class="container-fluid header-container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo-container">
                <!-- Logo oficial del Gobierno del Estado de México -->
                <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo" />
                <!-- Títulos del header visibles solo en pantallas md en adelante -->
                <div class="header-titles d-none d-md-block">
                    <div class="header-title">Sistema de Gestión de Administradores</div>
                    <div class="header-subtitle">Dirección de Abasto y Comercio</div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Fondo de onda decorativo al final -->
<div class="wave-bg"></div>

<!-- Contenedor principal del formulario -->
<div class="container main-content">
    <!-- Tarjeta principal para el formulario -->
    <div class="card card-modern mb-4">
        <!-- Header de la tarjeta con título e ID dinámico -->
        <div class="card-header-modern">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="card-title-modern">
                    <i class="bi bi-person-lines-fill"></i> <!-- Icono Bootstrap Icons -->
                    Editar Administrador
                </h2>
                <!-- Muestra el ID del usuario (usado en Laravel Blade) -->
                <small class="text-muted">ID: {{ $user->id }}</small>
            </div>
        </div>
        
        <div class="card-body">
            <!-- Mensajes de error de validación -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Por favor corrige los siguientes errores:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li> <!-- Lista cada error -->
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario para editar administrador -->
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf <!-- Token CSRF para seguridad -->
                @method('PUT') <!-- Método PUT para actualización -->

                <div class="row g-4">
                    <!-- Campo para nombre -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <!-- Valor conserva input anterior o del usuario -->
                            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div> <!-- Error específico -->
                            @enderror
                        </div>
                    </div>

                    <!-- Campo para correo -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Campo para nueva contraseña (opcional) -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Contraseña (opcional)</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-muted">Dejar en blanco para mantener la contraseña actual</small>
                            @error('password')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Confirmación de contraseña -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <!-- Selector de rol -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Rol</label>
                            <select name="role" class="form-select" required>
                                <option value="usuario" {{ $user->role == 'usuario' ? 'selected' : '' }}>Usuario</option>
                                <option value="administrador" {{ $user->role == 'administrador' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>
                    </div>

                    <!-- Botones de acción: Regresar, Restablecer y Actualizar -->
                    <div class="col-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary me-md-2">
                                <i class="bi bi-arrow-left me-1"></i> Regresar
                            </a>
                            <button type="reset" class="btn btn-outline-secondary me-md-2">
                                <i class="bi bi-eraser me-1"></i> Restablecer
                            </button>
                            <button type="submit" class="btn btn-edomex">
                                <i class="bi bi-save me-1"></i> Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Carga del JS de Bootstrap para componentes interactivos -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Fuerza recarga si la página viene del caché para evitar mostrar datos viejos
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
</body>
</html>
