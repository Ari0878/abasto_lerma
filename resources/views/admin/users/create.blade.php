<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Establece la codificación de caracteres a UTF-8 para soporte de caracteres especiales -->
    <meta charset="UTF-8" />

    <!-- Ícono que se muestra en la pestaña del navegador -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Escudo_de_Lerma.png/1200px-Escudo_de_Lerma.png" type="image/png">

    <!-- Hace que el diseño sea responsive en dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Título que aparece en la pestaña del navegador -->
    <title>Crear Administrador - Gobierno del Estado de México</title>

    <!-- Carga la hoja de estilos de Bootstrap (CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Carga Bootstrap Icons para usar íconos vectoriales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Carga la fuente tipográfica 'Inter' desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <style>
        /* Variables CSS para usar colores y estilos repetidos de forma fácil */
        :root {
            --edomex-green: rgb(236, 29, 29); /* Rojo institucional */
            --edomex-green-dark: rgba(233, 9, 9, 0.93);
            --edomex-green-light: #f9e8e8;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700; /* Dorado institucional */
            --edomex-gray: #6c757d;
            --edomex-light: #f8f9fa;
            --shadow-light: 0 2px 15px rgba(0,0,0,0.08);
            --shadow-medium: 0 8px 30px rgba(0,0,0,0.12);
            --shadow-heavy: 0 15px 50px rgba(0,0,0,0.15);
            --gradient-bg: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            --gradient-green: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
        }

        /* Aplica transición suave a todas las propiedades de todos los elementos */
        * {
            transition: all 0.3s ease;
        }

        /* Estilos generales para el body */
        body {
            background: var(--edomex-light); /* Fondo claro */
            font-family: 'Inter', sans-serif; /* Fuente legible y moderna */
            line-height: 1.6; /* Espaciado cómodo entre líneas */
            min-height: 100vh; /* Al menos altura completa de la ventana */
            position: relative;
            color: #333; /* Texto oscuro */
        }

        /* Estilos para el encabezado institucional */
        .header-gobierno {
            background: var(--gradient-green); /* Fondo con gradiente rojo */
            border-bottom: 4px solid var(--edomex-gold); /* Línea dorada abajo */
            box-shadow: var(--shadow-medium); /* Sombra para profundidad */
            position: sticky; /* Queda fijo al hacer scroll */
            top: 0;
            z-index: 1030; /* Por encima de otros elementos */
        }

        /* Contenedor interno del header con padding */
        .header-container {
            padding: 0.5rem 2rem;
        }

        /* Contenedor del logo y texto */
        .logo-container {
            display: flex; /* Flexbox para alinear elementos horizontalmente */
            align-items: center; /* Centra verticalmente */
            gap: 1rem; /* Espacio entre logo y texto */
        }

        /* Estilo del logo */
        .logo {
            height: 60px; /* Tamaño fijo */
            filter: brightness(0) invert(1); /* Hace el logo blanco para visibilidad */
            transition: transform 0.3s ease; /* Transición suave para hover */
        }

        /* Al pasar el mouse, el logo crece ligeramente */
        .logo:hover {
            transform: scale(1.05);
        }

        /* Contenedor para los títulos del header */
        .header-titles {
            color: white; /* Texto blanco */
        }

        /* Título principal */
        .header-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
            letter-spacing: 0.5px;
        }

        /* Subtítulo */
        .header-subtitle {
            font-size: 0.85rem;
            opacity: 0.9;
            font-weight: 400;
        }

        /* Contenedor principal del contenido */
        .main-content {
            padding: 2rem 0 4rem; /* Espaciado arriba y abajo */
            position: relative;
            z-index: 1; /* Por encima del fondo decorativo */
        }

        /* Tarjeta con diseño moderno */
        .card-modern {
            border: none; /* Sin borde */
            border-radius: 16px; /* Bordes redondeados */
            box-shadow: var(--shadow-medium); /* Sombra */
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
            background: var(--gradient-green); /* Línea con gradiente */
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

        /* Botón con estilo institucional */
        .btn-edomex {
            background: var(--gradient-green); /* Fondo con gradiente rojo */
            color: white;
            font-weight: 600;
            padding: 0.7rem 1.5rem;
            border-radius: 50px; /* Bordes redondeados */
            border: none;
            box-shadow: var(--shadow-light);
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
        }

        /* Efecto hover para el botón */
        .btn-edomex:hover {
            transform: translateY(-2px); /* Se eleva */
            box-shadow: var(--shadow-medium);
            opacity: 0.9;
        }

        /* Botón con borde y fondo blanco */
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
        }

        /* Hover para botón outline */
        .btn-edomex-outline:hover {
            background: var(--edomex-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        /* Estilo para etiquetas del formulario */
        .form-label-modern {
            font-weight: 600;
            color: var(--edomex-green-dark);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        /* Estilo para campos de formulario */
        .form-control-modern {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.8rem 1rem;
        }

        /* Estilo para campos de formulario enfocados */
        .form-control-modern:focus {
            border-color: var(--edomex-green);
            box-shadow: 0 0 0 0.25rem rgba(224, 10, 10, 0.25);
        }

        /* Estilo para alertas personalizadas */
        .alert-modern {
            border-radius: 10px;
            border-left: 4px solid var(--edomex-green);
        }

        /* Fondo decorativo de ondas rojas en la parte inferior */
        .wave-bg {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20vh;
            /* Aquí se puede colocar un fondo SVG o imagen de ondas (acá se dejó un placeholder) */
            background: url('data:image/svg+xml,%3Csvg...%3C/svg%3E');
            background-size: cover;
            background-repeat: no-repeat;
            z-index: 0;
            pointer-events: none; /* No afecta la interacción del usuario */
        }

        /* Ajustes para pantallas medianas (tablets, etc) */
        @media (max-width: 992px) {
            .header-container {
                padding: 0.5rem 1rem;
            }
        }

        /* Ajustes para pantallas pequeñas (móviles) */
        @media (max-width: 768px) {
            .card-title-modern {
                font-size: 1.2rem;
            }

            .btn-edomex, .btn-edomex-outline {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
        }

        /* Ajustes para pantallas muy pequeñas */
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

            .form-control-modern {
                padding: 0.6rem;
            }
        }
    </style>
</head>
<body>

<!-- Encabezado fijo con logo y texto institucional -->
<header class="header-gobierno">
    <div class="container-fluid header-container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo-container">
                <!-- Logo del gobierno local -->
                <img src="https://lerma.gob.mx/wp-content/uploads/2022/10/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo" />
                <!-- Títulos solo visibles en pantallas medianas para arriba -->
                <div class="header-titles d-none d-md-block">
                    <div class="header-title">Sistema de Gestión de Usuarios</div>
                    <div class="header-subtitle">Dirección de Abasto y Comercio</div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Fondo decorativo con ondas -->
<div class="wave-bg"></div>

<!-- Contenedor principal para el formulario -->
<div class="container main-content">
    <div class="card card-modern mx-auto" style="max-width: 600px;">
        <div class="card-header-modern">
            <!-- Título de la tarjeta con icono -->
            <h2 class="card-title-modern">
                <i class="bi bi-person-plus-fill"></i> Crear nuevo administrador
            </h2>
        </div>
        <div class="card-body p-4">
            <form>
                <!-- Campo para correo electrónico -->
                <div class="mb-3">
                    <label for="email" class="form-label-modern">Correo electrónico</label>
                    <input type="email" class="form-control-modern" id="email" placeholder="usuario@ejemplo.com" required />
                </div>

                <!-- Campo para nombre completo -->
                <div class="mb-3">
                    <label for="name" class="form-label-modern">Nombre completo</label>
                    <input type="text" class="form-control-modern" id="name" placeholder="Nombre completo" required />
                </div>

                <!-- Campo para contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label-modern">Contraseña</label>
                    <input type="password" class="form-control-modern" id="password" placeholder="Contraseña segura" required />
                </div>

                <!-- Botón para enviar el formulario -->
                <button type="submit" class="btn-edomex w-100">
                    <i class="bi bi-check-circle"></i> Crear administrador
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap para funcionalidades como dropdowns, modals, etc -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>