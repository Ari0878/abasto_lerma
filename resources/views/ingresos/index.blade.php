<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingresos - Gobierno del Estado de México</title>

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

    .header-gobierno {
      background: linear-gradient(135deg, var(--edomex-blue) 0%, rgb(241, 9, 9)100%);
      border-bottom: 4px solid var(--edomex-gold);
      color: white;
      padding: 1rem 0;
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

<!-- Encabezado -->
<header class="header-gobierno mb-4">
  <div class="container">
    <div class="d-flex align-items-center">
      <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo">
      <div class="title-container">
        <h1 class="h4 mb-0">Ingresos Registrados</h1>
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
          <li class="nav-item"><a class="nav-link" href="{{ route('ingresos.index') }}">Ingresos</a></li>
          <li class="nav-item dropdown ms-3">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              {{ auth()->user()->name }} <br>{{ auth()->user()->role }}
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
      <h2 class="h5 text-primary mb-0"><i class="bi bi-cash-coin me-2"></i>Ingresos del año {{ $año }}</h2>
      <a href="{{ route('ingresos.create') }}" class="btn btn-edomex">
        <i class="bi bi-plus-circle me-1"></i> Nuevo ingreso
      </a>
    </div>

    <div class="card-body">
        <form method="GET" class="mb-4">
          <label for="año">Selecciona un año:</label>
          <div class="d-flex">
            <input type="number" name="año" id="año" value="{{ $año }}" min="2000" max="2100" class="form-control w-25 me-2">
            <button class="btn btn-edomex"><i class="bi bi-search me-1"></i> Filtrar</button>
          </div>
        </form>


      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if($ingresos->isEmpty())
        <p>No hay ingresos registrados para este año.</p>
      @else
        @php
          $meses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo',
            4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
            7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre',
            10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
          ];
        @endphp

        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle">
            <thead class="text-center">
              <tr>
                <th>Mes</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ingresos as $ingreso)
                <tr>
                  <td>{{ $meses[$ingreso->mes] }}</td>
                  <td>${{ number_format($ingreso->cantidad, 2) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          <h5>Total del año {{ $año }}: <strong>${{ number_format($total, 2) }}</strong></h5>
        </div>
      @endif

      <a href="{{ route('ingresos.comparar') }}" class="btn btn-outline-info mt-4">
        <i class="bi bi-graph-up-arrow"></i> Comparar Años
      </a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
</body>
</html>
