<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detalle de Expediente - Gobierno del Estado de México</title>
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
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

    /* Card mejorada */
    .card-modern {
      border: none;
      border-radius: 16px;
      box-shadow: var(--shadow-medium);
      overflow: hidden;
      margin-bottom: 2rem;
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
      background: var(--edomex-green-light);
      color: var(--edomex-green-dark);
    }

    /* Detalle cards */
    .detail-card {
      border-radius: 12px;
      border: none;
      box-shadow: var(--shadow-light);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }

    .detail-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-medium);
    }

    .detail-card .card-body {
      padding: 1.5rem;
    }

    .detail-card .card-title {
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--edomex-green-dark);
      border-bottom: 2px solid var(--edomex-green-light);
      padding-bottom: 0.75rem;
      margin-bottom: 1.25rem;
      display: flex;
      align-items: center;
      gap: 0.7rem;
    }

    .detail-item {
      margin-bottom: 1rem;
    }

    .detail-label {
      font-size: 0.85rem;
      font-weight: 500;
      color: var(--edomex-gray);
      margin-bottom: 0.25rem;
    }

    .detail-value {
      font-size: 1rem;
      font-weight: 500;
      color: #333;
    }

    /* Badges */
    .badge-completo {
      background-color: #28a745;
      padding: 0.5rem 0.8rem;
      border-radius: 50px;
      font-weight: 500;
    }

    .badge-incompleto {
      background-color: #dc3545;
      padding: 0.5rem 0.8rem;
      border-radius: 50px;
      font-weight: 500;
    }

    /* Documentos adjuntos */
    .document-list {
      border-radius: 12px;
      overflow: hidden;
    }

    .document-item {
      display: flex;
      align-items: center;
      padding: 1rem;
      border-bottom: 1px solid rgba(0,0,0,0.05);
      transition: all 0.3s ease;
      background: white;
      text-decoration: none;
      color: inherit;
    }

    .document-item:hover {
      background: var(--edomex-green-light);
    }

    .document-item:last-child {
      border-bottom: none;
    }

    .document-icon {
      font-size: 1.75rem;
      color: var(--edomex-green);
      margin-right: 1rem;
    }

    .document-info h6 {
      font-weight: 600;
      margin-bottom: 0.25rem;
    }

    .document-info small {
      color: var(--edomex-gray);
      font-size: 0.8rem;
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

    /* Modal mejorado */
    .modal-content {
      border-radius: 16px;
      border: none;
      overflow: hidden;
    }

    .modal-header {
      background: var(--gradient-green);
      color: white;
      border-bottom: none;
      padding: 1.25rem 1.5rem;
    }

    .modal-title {
      font-weight: 600;
    }

    .modal-footer {
      border-top: none;
      background: var(--edomex-light);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .card-header-modern {
        padding: 1.25rem;
      }
      
      .card-title-modern {
        font-size: 1.3rem;
      }
      
      .detail-card .card-body {
        padding: 1.25rem;
      }
    }

    @media (max-width: 576px) {
      .header-container {
        padding: 0.5rem 1rem;
      }
      
      .logo {
        height: 50px;
      }
      
      .card-title-modern {
        font-size: 1.2rem;
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
    <div class="d-flex align-items-center">
      <div class="logo-container">
        <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo" />
        <div class="header-titles">
          <div class="header-title">Sistema de Gestión de Expedientes</div>
          <div class="header-subtitle">Abasto y Comercio</div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Fondo de onda decorativo -->
<div class="wave-bg"></div>

<!-- Contenido Principal -->
<div class="container py-4">
  <div class="card card-modern">
    <div class="card-header-modern">
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="card-title-modern">
          <i class="bi bi-file-earmark-text"></i>
          Detalles del Expediente
        </h2>
        <a href="{{ route('expediente', ['page' => request()->get('page', 1)]) }}" class="btn btn-outline-edomex">
          <i class="bi bi-arrow-left me-1"></i> Regresar
        </a>
      </div>
      <small class="text-muted d-block mt-2">N° Expediente: {{ $expediente->folio }}</small>
    </div>
    
    <div class="card-body">
      <div class="row g-4 mb-4">
        <div class="col-md-6">
          <div class="card detail-card h-100">
            <div class="card-body">
              <h5 class="card-title">
                <i class="bi bi-person-lines-fill"></i> Datos Personales
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
        </div>
        
        <div class="col-md-6">
          <div class="card detail-card h-100">
            <div class="card-body">
              <h5 class="card-title">
                <i class="bi bi-file-earmark-fill"></i> Datos del Documento
              </h5>
              
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
                    <span class="badge-completo">Completo</span>
                  @elseif($expediente->estado == 'Incompleto')
                    <span class="badge-incompleto">Incompleto</span>
                  @else
                    <span class="badge bg-secondary">Sin estado</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
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
      
      <div class="d-flex justify-content-end mt-4">
        <a href="{{ route('expediente_editar', ['id' => $expediente->id, 'page' => request()->get('page')]) }}" class="btn-edomex"> 
          <i class="bi bi-pencil-square me-1"></i> Editar Expediente
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Modal para visualización de archivos -->
<div class="modal fade" id="visorArchivoModal" tabindex="-1" aria-labelledby="visorArchivoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Visualización de Documento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <iframe id="visorArchivoFrame" src="" style="width: 100%; height: 75vh; border: none;"></iframe>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Configuración del visor de archivos
  document.querySelectorAll('.archivo-link').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const archivoUrl = this.getAttribute('data-archivo');
      document.getElementById('visorArchivoFrame').src = archivoUrl;
      document.getElementById('downloadLink').href = archivoUrl;  
    });
  });
  
  // Limpiar iframe al cerrar el modal
  document.getElementById('visorArchivoModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('visorArchivoFrame').src = '';
  });

  // Recargar la página cuando se navega con el caché del navegador
  window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
      window.location.reload();
    }
  });
</script>
</body>
</html>