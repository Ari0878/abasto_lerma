<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Expediente - Abasto y Comercio</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    
    <!-- Bootstrap & Icons -->
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

        /* Navbar styles */
        .navbar-nav .nav-item {
            margin: 0 0.3rem;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background: rgba(255,255,255,0.15);
            color: var(--edomex-gold);
        }

        .navbar-nav .nav-link i {
            font-size: 1.1rem;
        }

        .dropdown-toggle::after {
            margin-left: 0.5rem;
            vertical-align: middle;
        }

        .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: var(--shadow-heavy);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .dropdown-item:hover {
            background: var(--edomex-green-light);
            color: var(--edomex-green-dark);
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            padding: 2rem 0 4rem;
            position: relative;
            z-index: 1;
        }

        /* Card styles */
        .card-modern {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-medium);
            overflow: hidden;
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

        /* Button styles */
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

        .btn-outline-edomex {
            border: 2px solid var(--edomex-green);
            color: var(--edomex-green);
            font-weight: 600;
            background: white;
        }

        .btn-outline-edomex:hover {
            background: var(--edomex-green);
            color: white;
        }

        /* Search section */
        .search-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: var(--shadow-medium);
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 1.5rem;
        }

        /* Form styles */
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
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
            padding: 0.75rem 1.5rem;
        }

        /* Detail cards */
        .detail-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
            height: 100%;
            border-left: 3px solid var(--edomex-green);
        }

        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .detail-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--edomex-green-light);
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .detail-item {
            margin-bottom: 1rem;
        }

        .detail-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--edomex-gray);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .detail-value {
            font-size: 1rem;
            font-weight: 500;
            color: #333;
        }

        /* Badges */
        .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .badge-completo {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid #28a745;
        }

        .badge-incompleto {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid #dc3545;
        }

        /* Document list */
        .document-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .document-item {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }

        .document-item:hover {
            background-color: var(--edomex-light);
            transform: translateX(5px);
        }

        .document-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            color: inherit;
        }

        .document-icon {
            font-size: 1.5rem;
            color: #dc3545;
        }

        .document-name {
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .document-meta {
            font-size: 0.85rem;
            color: var(--edomex-gray);
        }

        /* Alert */
        .alert {
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            font-weight: 500;
            box-shadow: var(--shadow-light);
            border: none;
        }

        /* Modal */
        .modal-content {
            border-radius: 16px;
            overflow: hidden;
            border: none;
            box-shadow: var(--shadow-heavy);
        }

        .modal-header {
            background: var(--gradient-green);
            color: white;
            padding: 1.5rem;
            border-bottom: none;
        }

        .modal-title {
            font-weight: 700;
        }

        .modal-body {
            padding: 0;
        }

        .modal-body iframe {
            width: 100%;
            height: 500px;
            border: none;
        }

        /* Wave background */
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

        /* Responsive */
        @media (max-width: 992px) {
            .header-container {
                padding: 0.5rem 1rem;
            }
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 1.5rem;
            }
            
            .card-title-modern {
                font-size: 1.3rem;
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
            
            .btn-edomex {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
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
                <div class="header-titles">
                    <div class="header-title">Sistema de Gestión</div>
                    <div class="header-subtitle">Dirección de Abasto y Comercio</div>
                </div>
            </div>

            <nav class="navbar navbar-expand-md navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGob" aria-controls="navGob" aria-expanded="false" aria-label="Menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navGob">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>
                                <span>{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="px-3 py-2 text-center border-bottom">
                                    <strong>{{ auth()->user()->name }}</strong><br>
                                    <small class="text-muted">{{ ucfirst(auth()->user()->role) }}</small>
                                </li>
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
    <!-- Tarjeta contenedora -->
    <div class="card card-modern mb-4">
        <div class="card-header-modern">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="card-title-modern">
                    <i class="bi bi-search"></i>
                    Buscar Expediente
                </h2>
                <a href="{{ route('usuario.welcome') }}" class="btn btn-outline-edomex">
                    <i class="bi bi-arrow-left me-1"></i> Volver
                </a>
            </div>
        </div>
        
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            <!-- Formulario de búsqueda -->
            <div class="search-section">
                <form action="{{ route('expediente.search') }}" method="GET" class="mb-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                                <input type="text" 
                                       class="form-control" 
                                       name="numero_expediente" 
                                       placeholder="Ingrese el folio del expediente" 
                                       required
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-edomex w-100">
                                <i class="bi bi-search me-2"></i> Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if(isset($expediente))
                <!-- Resultados de búsqueda -->
                <div class="row g-4">
                    <!-- Datos personales -->
                    <div class="col-md-6">
                        <div class="detail-card">
                            <h5 class="detail-title">
                                <i class="bi bi-person-lines-fill"></i>
                                Datos Personales
                            </h5>
                            
                            <div class="detail-item">
                                <div class="detail-label">Nombre Completo</div>
                                <div class="detail-value">{{ $expediente->ap }} {{ $expediente->am }} {{ $expediente->nombre }}</div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-label">Región</div>
                                <div class="detail-value">{{ $expediente->region->nombre ?? 'No especificado' }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Datos del documento -->
                    <div class="col-md-6">
                        <div class="detail-card">
                            <h5 class="detail-title">
                                <i class="bi bi-file-earmark-fill"></i>
                                Datos del Documento
                            </h5>
                            
                            <div class="detail-item">
                                <div class="detail-label">Folio</div>
                                <div class="detail-value">{{ $expediente->folio }}</div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">Localización</div>
                                <div class="detail-value">{{ $expediente->localizacion }}</div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">Giro</div>
                                <div class="detail-value">{{ $expediente->giro }}</div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-label">Tipo de Expediente</div>
                                <div class="detail-value">{{ $expediente->tipo_expe }}</div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-label">Estado</div>
                                <div class="detail-value">
                                    @if($expediente->estado == 'Completo')
                                        <span class="badge-status badge-completo">Completo</span>
                                    @elseif($expediente->estado == 'Incompleto')
                                        <span class="badge-status badge-incompleto">Incompleto</span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill">Sin estado</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Documentos adjuntos -->
                    <div class="card detail-card">
        <div class="card-body">
          <h5 class="card-title">
            <i class="bi bi-paperclip"></i> Documentos Adjuntos
          </h5>
          
          @php
            $archivos = explode(',', $expediente->archivo);
          @endphp

          @if(count($archivos) > 0 && $archivos[0] != '')
            <div class="document-list">
              @foreach ($archivos as $archivo)
                <a href="#" class="document-item archivo-link" 
                   data-bs-toggle="modal" data-bs-target="#visorArchivoModal"
                   data-archivo="{{ route('expedientes.archivo', ['filename' => trim($archivo)]) }}">
                  <div class="document-icon">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                  </div>
                  <div class="document-info">
                    <h6>{{ $archivo }}</h6>
                    <small>Click para visualizar</small>
                  </div>
                </a>
              @endforeach
            </div>
          @else
            <div class="alert alert-info mb-0">
              <i class="bi bi-info-circle me-2"></i> No hay documentos adjuntos a este expediente.
            </div>
          @endif
        </div>
      </div>
                </div>
            @endif
        </div>
    </div>
</div>


<!-- Modal para visualizar archivos -->
<div class="modal fade" id="visorArchivoModal" tabindex="-1" aria-labelledby="visorArchivoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visualización de Documento</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <iframe id="visorArchivo" src="" style="width: 100%; height: 75vh; border: none;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg me-1"></i> Cerrar
                </button>
                <a id="downloadLink" href="#" class="btn-edomex">
                    <i class="bi bi-download me-1"></i> Visualizar en otra pestaña
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const archivoLinks = document.querySelectorAll('.archivo-link');
        const visorArchivo = document.getElementById('visorArchivo');
        const downloadLink = document.getElementById('downloadLink');

        archivoLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.dataset.archivo;
                visorArchivo.src = url;
                downloadLink.href = url;
                
                // Actualizar título del modal con el nombre del archivo
                const fileName = this.querySelector('h6').textContent;
                document.querySelector('#visorArchivoModal .modal-title').textContent = `Visualizando: ${fileName}`;
            });
        });

        // Limpiar el iframe cuando se cierra el modal
        const modal = document.getElementById('visorArchivoModal');
        modal.addEventListener('hidden.bs.modal', function () {
            visorArchivo.src = '';
        });
    });
</script>

</body>
</html>