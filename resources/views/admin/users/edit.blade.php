<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Administrador - Gobierno del Estado de México</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --edomex-blue:rgb(224, 10, 10);
      --edomex-red: #E4002B;
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
      background-color: rgb(224, 10, 10);
      color: white;
    }

    .btn-edomex-outline {
      border: 1px solid var(--edomex-blue);
      color: var(--edomex-blue);
    }

    .btn-edomex-outline:hover {
      background-color: var(--edomex-blue);
      color: white;
    }

    .form-label {
      font-weight: 500;
      color: var(--edomex-blue);
    }
  </style>
</head>
<body>

<!-- Encabezado -->
<header class="header mb-4">
  <div class="container">
    <div class="d-flex align-items-center">
      <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo">
      <div class="title-container">
        <h1 class="h4 mb-0">Sistema de Gestión de Administradores</h1>
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
          <i class="bi bi-person-lines-fill me-2"></i>Editar Administrador
        </h2>
        <small class="text-muted">ID: {{ $user->id }}</small>
      </div>
      <a href="{{ route('users.index') }}" class="btn btn-edomex-outline">
        <i class="bi bi-arrow-left me-1"></i> Regresar
      </a>
    </div>

    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          <strong>Por favor corrige los siguientes errores:</strong>
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
            @error('name')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
            @error('email')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label class="form-label">Contraseña (opcional)</label>
            <input type="password" name="password" class="form-control">
            @error('password')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>

          <div class="col-12 d-flex justify-content-end mt-4">
            <button type="reset" class="btn btn-secondary me-2">
              <i class="bi bi-eraser me-1"></i> Restablecer
            </button>
            <button type="submit" class="btn btn-edomex">
              <i class="bi bi-save me-1"></i> Actualizar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
