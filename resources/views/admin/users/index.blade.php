<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administradores - Gobierno del Estado de México</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
      :root {
        --edomex-blue: rgb(224, 10, 10);
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
      .navbar-dark .navbar-nav .nav-link {
          color: #fff;
          font-weight: 500;
          margin-left: 1rem;
          }
          .header-gobierno {
          background: linear-gradient(135deg, var(--edomex-blue) 0%, rgba(241, 9, 9, 0.68) 100%); /* Verde institucional */
          border-bottom: 4px solid #FFD700; /* Dorado */
          }
          .navbar-dark .navbar-nav .nav-link:hover {
          color: #FFD700;
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

      .btn-sm {
        font-size: 0.85rem;
      }

      .card-shadow {
        box-shadow: 0 4px 8px rgba(3, 142, 26, 0.3);
        border-radius: 8px;
        border: none;
      }

      table thead {
        background-color: #e9f7ed;
      }

      .table td, .table th {
        vertical-align: middle;
      }
    </style>
</head>
<body>

<!-- Encabezado institucional -->
<header class="header-gobierno mb-4">
  <div class="container">
    <div class="d-flex align-items-center">
      <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo">
      <div class="title-container">
        <h1 class="h4 mb-0">Administradores del Sistema</h1>
        <small>Abasto y Comercio</small>
      </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-dark">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGob" aria-controls="navGob" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navGob">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.welcome') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('expediente') }}">Expediente</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('region') }}">Regiones</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('estadisticas') }}">Estadísticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                    <li class="nav-item dropdown ms-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }} <br>{{auth()->user()->role}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </li>
                </ul>
            </div>
        </nav>
  </div>
</header>

<!-- Contenido -->
<div class="container mb-5">
  <div class="card card-shadow">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
      <h2 class="h5 text-primary mb-0"><i class="bi bi-people-fill me-2"></i>Lista de Administradores</h2>
      <a href="{{ route('users.create') }}" class="btn btn-edomex">
        <i class="bi bi-plus-circle me-1"></i> Crear nuevo
      </a>
    </div>

    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="table-responsive">
        <table class="table table-bordered table-striped mt-3 align-middle">
          <thead class="text-center">
            <tr>
              <th>Nombre</th>
              <th>Correo Electrónico</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-1">
                    <i class="bi bi-pencil-square"></i> Editar
                  </a>
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar?')">
                      <i class="bi bi-trash3"></i> Eliminar
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="text-center">No hay administradores registrados.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <table class="table table-bordered table-striped mt-3 align-middle ">
<thead class="text-center">
            <tr>
              <th>Nombre</th>
              <th>Ip_address</th>
              <th>Plataforma</th>
              <th>Browser</th>
              <th>Fecha de Acceso</th>
            </tr>
          </thead>
@foreach($logs as $log)
      <tr>
      <td>{{ $log->user->name }}</td>
          <td>{{ $log->ip_address }}</td>
          <td>{{ $log->platform }}</td>
          <td>{{ $log->browser }}</td>
          <td>{{ $log->created_at }}</td>
      </tr>
  @endforeach 
  </table>
      </div>
    </div>
  </div>
</div>
<script>    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
