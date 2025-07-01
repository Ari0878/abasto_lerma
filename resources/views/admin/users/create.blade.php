<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Administrador - Abasto y Comercio</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --edomex-blue:rgb(224, 10, 10);
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background: linear-gradient(135deg, var(--edomex-blue) 0%, rgba(241, 9, 9, 0.68) 100%);
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

        .btn-edomex {
            background-color: var(--edomex-blue);
            color: white;
            border: none;
        }

        .btn-edomex:hover {
            background-color:rgb(224, 10, 10);
            color: white;
        }

        .form-label {
            font-weight: 500;
            color: var(--edomex-blue);
        }

        .footer {
            background-color: var(--edomex-blue);
            color: white;
            padding: 1.5rem 0;
            margin-top: 2rem;
            font-size: 0.9rem;
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
                    <h1 class="h4 mb-0">Sistema de Gestión de Usuarios</h1>
                    <small>Abasto y Comercio</small>
                </div>
            </div>
        </div>
    </header>

    <div class="container mb-5">
        <div class="card card-shadow">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="h5 mb-0 text-primary"><i class="bi bi-person-plus me-2"></i>Crear Administrador</h2>
                        <small class="text-muted">Llene los campos requeridos</small>
                    </div>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Regresar
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Corrige los siguientes errores:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Rol</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="usuario" {{ old('role') == 'usuario' ? 'selected' : '' }}>Usuario</option>
                            <option value="administrador" {{ old('role') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="reset" class="btn btn-secondary me-md-2">
                            <i class="bi bi-eraser me-1"></i> Limpiar
                        </button>
                        <button type="submit" class="btn btn-edomex">
                            <i class="bi bi-save me-1"></i> Guardar Administrador
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
