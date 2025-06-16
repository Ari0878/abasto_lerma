<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Región - Gobierno del Estado de México</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --edomex-green: rgb(224, 10, 10);
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background: linear-gradient(135deg, var(--edomex-green) 0%, rgba(241, 9, 9, 0.68) 100%);
            color: white;
            padding: 1rem 0;
            border-bottom: 5px solid var(--edomex-gold);
        }

        .logo {
            height: 60px;
            margin-right: 15px;
        }

        .title-container {
            border-left: 3px solid var(--edomex-gold);
            padding-left: 15px;
        }

        .card-shadow {
            box-shadow: 0 4px 8px rgb(224, 10, 10);
            border-radius: 8px;
            border: none;
        }

        .detail-label {
            font-weight: 600;
            color: #6c757d;
        }

        .btn-edomex-outline {
            border: 1px solid var(--edomex-green);
            color: var(--edomex-green);
        }

        .btn-edomex-outline:hover {
            background-color: var(--edomex-green);
            color: white;
        }
    </style>
</head>
<body>

<!-- Encabezado institucional -->
<header class="header mb-4">
    <div class="container">
        <div class="d-flex align-items-center">
        <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo">
            <div class="title-container">
                <h1 class="h4 mb-0">Sistema de Gestión de Regiones</h1>
                <small>Abasto y Comercio</small>
            </div>
        </div>
    </div>
</header>

<!-- Contenido -->
<div class="container mb-5">
    <div class="card card-shadow">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h5 text-primary mb-0">
                    <i class="bi bi-geo-alt me-2"></i>Detalles de la Región
                </h2>
                <small class="text-muted">Consulta detallada</small>
            </div>
            <a href="{{ route('region') }}" class="btn btn-edomex-outline">
                <i class="bi bi-arrow-left me-1"></i> Regresar
            </a>
        </div>

        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4">
                    <h6 class="detail-label">ID</h6>
                    <p>{{ $region->id }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="detail-label">Número de Región</h6>
                    <p>{{ $region->numero_region }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="detail-label">Nombre de la Región</h6>
                    <p>{{ $region->nombre }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
