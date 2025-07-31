<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nuevo Expediente - Abasto y Comercio</title>

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

        /* Navbar mejorado */
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

        /* Dropdown mejorado */
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

        .dropdown-divider {
            margin: 0.5rem 0;
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

        /* Formulario mejorado */
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
        
        /* Alertas mejoradas */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 500;
            box-shadow: var(--shadow-light);
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

        /* ===== NUEVO DISEÑO PARA ADJUNTAR ARCHIVOS ===== */
        .file-upload-container {
            border: 2px dashed #ced4da;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            background-color: white;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .file-upload-container:hover {
            border-color: var(--edomex-green);
            background-color: rgba(236, 29, 29, 0.03);
        }

        .file-upload-container.dragover {
            border-color: var(--edomex-green);
            background-color: var(--edomex-green-light);
            box-shadow: 0 0 0 4px rgba(236, 29, 29, 0.1);
        }

        .file-upload-icon {
            font-size: 3rem;
            color: var(--edomex-green);
            margin-bottom: 1rem;
        }

        .file-upload-text {
            margin-bottom: 1.5rem;
        }

        .file-upload-text h5 {
            color: var(--edomex-green-dark);
            font-weight: 600;
        }

        .file-upload-text p {
            color: var(--edomex-gray);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .file-upload-btn {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-upload-btn input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        /* Lista de archivos adjuntos */
        .attachments-list {
            margin-top: 1.5rem;
        }

        .attachment-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            box-shadow: var(--shadow-light);
            transition: all 0.2s ease;
        }

        .attachment-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .attachment-icon {
            font-size: 1.5rem;
            color: var(--edomex-green);
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .attachment-info {
            flex-grow: 1;
            overflow: hidden;
        }

        .attachment-name {
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 0.2rem;
        }

        .attachment-size {
            font-size: 0.8rem;
            color: var(--edomex-gray);
        }

        .attachment-remove {
            color: #dc3545;
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.5rem;
            margin-left: 0.5rem;
            transition: all 0.2s ease;
        }

        .attachment-remove:hover {
            transform: scale(1.2);
        }

        /* Progress bar */
        .upload-progress {
            height: 6px;
            background-color: #e9ecef;
            border-radius: 3px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .upload-progress-bar {
            height: 100%;
            background-color: var(--edomex-green);
            width: 0%;
            transition: width 0.3s ease;
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
            
            .file-upload-container {
                padding: 1.5rem;
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
                    <div class="header-title">Sistema de Gestión de Expedientes</div>
                    <div class="header-subtitle">Dirección de Abasto y Comercio</div>
                </div>
            </div>
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
                    <i class="bi bi-file-earmark-plus"></i>
                    Nuevo Expediente
                </h2>
                <small class="text-muted">Complete los datos requeridos</small>
            </div>
        </div>
        
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Por favor corrige los siguientes errores:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('expediente_registrar') }}" method="POST" enctype="multipart/form-data" id="expedienteForm">
                @csrf
                <input type="hidden" name="page" value="{{ $pagina }}">
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-secondary">Datos Generales</h5>
                        
                        <div class="mb-3">
                            <label for="folio" class="form-label">Número de Expediente</label>
                            <input type="text" class="form-control" id="folio" name="folio" value="{{ old('folio') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="ap" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="ap" name="ap" value="{{ old('ap') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="am" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="am" name="am" value="{{ old('am') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-secondary">Datos del Documento</h5>
                        
                        <div class="mb-3">
                            <label for="localizacion" class="form-label">Localización</label>
                            <input type="text" class="form-control" id="localizacion" name="localizacion" value="{{ old('localizacion') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="giro" class="form-label">Giro</label>
                            <input type="text" class="form-control" id="giro" name="giro" value="{{ old('giro') }}" required>
                        </div>
                        
                        <div class="mb-3">
    <label for="tipo_expe" class="form-label">Tipo de Expediente</label>
    <select class="form-select" id="tipo_expe" name="tipo_expe" required>
        <option value="">-- Seleccione --</option>
        <option value="LICENCIA" {{ old('tipo_expe') == 'LICENCIA' ? 'selected' : '' }}>LICENCIA</option>
        <option value="PERMISO" {{ old('tipo_expe') == 'PERMISO' ? 'selected' : '' }}>PERMISO</option>
        <option value="TARJETÓN" {{ old('tipo_expe') == 'TARJETÓN' ? 'selected' : '' }}>TARJETÓN</option>
    </select>
</div>
                        
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado del Expediente</label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="">-- Seleccione --</option>
                                <option value="Completo" {{ old('estado') == 'Completo' ? 'selected' : '' }}>Completo</option>
                                <option value="Incompleto" {{ old('estado') == 'Incompleto' ? 'selected' : '' }}>Incompleto</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="region_id" class="form-label">Región</label>
                            <select class="form-select" id="region_id" name="region_id" required>
                                <option value="">-- Seleccione una región --</option>
                                @foreach($regiones as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                        {{ $region->numero_region }} - {{ $region->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3 text-secondary">Documentos Adjuntos</h5>
                        
                        <div class="file-upload-container" id="dropZone">
    <div class="file-upload-icon">
        <i class="bi bi-cloud-arrow-up"></i>
    </div>
    <div class="file-upload-text">
        <h5>Arrastra y suelta tus archivos aquí</h5>
        <p>o</p>
    </div>
    <div class="file-upload-btn">
    <button type="button" class="btn btn-edomex" id="selectFilesBtn">
        <i class="bi bi-folder2-open me-1"></i> Seleccionar archivos
    </button>
    <input type="file" id="archivo" name="archivo[]" multiple 
           accept=".pdf,.doc,.docx,.txt" hidden>
</div>
    <small class="text-muted d-block mt-2">Formatos permitidos: PDF, DOC, DOCX, TXT (Máx. 20MB cada uno)</small>
</div>

<div class="attachments-list" id="attachmentsList">
    <!-- Los archivos aparecerán aquí -->
</div>
                        
                        <!-- Lista de archivos seleccionados -->
                        <div class="attachments-list" id="attachmentsList">
                            <!-- Los archivos se agregarán aquí dinámicamente -->
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('expediente', ['page' => request()->get('page', 1)]) }}" class="btn btn-secondary me-md-2">
                                <i class="bi bi-arrow-left me-1"></i> Regresar
                            </a>
                            <button type="button" class="btn btn-outline-secondary me-md-2" id="resetFormBtn">
                                <i class="bi bi-eraser me-1"></i> Limpiar
                            </button>

                            <button type="submit" class="btn btn-edomex">
                                <i class="bi bi-save me-1"></i> Guardar Expediente
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('archivo');
    const attachmentsList = document.getElementById('attachmentsList');
    const selectFilesBtn = document.getElementById('selectFilesBtn');

    let storedFiles = [];

    // Abrir el input al hacer clic en el botón
    selectFilesBtn.addEventListener('click', () => fileInput.click());

    // Selección manual
    fileInput.addEventListener('change', (e) => {
        handleFiles([...e.target.files]);
        fileInput.value = ''; // reset para permitir re-seleccionar el mismo archivo
    });

    // Prevenir comportamiento por defecto global
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        document.addEventListener(eventName, e => {
            e.preventDefault();
            e.stopPropagation();
        }, false);
    });

    // Estilo cuando se arrastra
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.add('dragover'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.remove('dragover'), false);
    });

    // Soltar archivos
    dropZone.addEventListener('drop', (e) => {
        const files = [...e.dataTransfer.files];
        handleFiles(files);
    });

    // Manejo de múltiples archivos
    function handleFiles(newFiles) {
        const validTypes = ['application/pdf', 'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'text/plain'];

        newFiles.forEach(file => {
            const isValidType = validTypes.includes(file.type) || file.name.match(/\.(pdf|doc|docx|txt)$/i);
            const isValidSize = file.size <= 20 * 1024 * 1024;

            if (!isValidType) {
                alert(`Archivo no permitido: ${file.name}`);
                return;
            }

            if (!isValidSize) {
                alert(`Archivo demasiado grande: ${file.name}`);
                return;
            }

            // Evitar duplicados por nombre
            if (storedFiles.some(f => f.name === file.name && f.size === file.size)) {
                alert(`El archivo "${file.name}" ya ha sido añadido.`);
                return;
            }

            storedFiles.push(file);
            addFileToList(file);
        });

        updateFileInput();
    }

    // Agregar archivo visualmente
    function addFileToList(file) {
        const fileSize = formatFileSize(file.size);
        const fileTypeIcon = getFileTypeIcon(file);

        const attachmentItem = document.createElement('div');
        attachmentItem.className = 'attachment-item';
        attachmentItem.innerHTML = `
            <div class="attachment-icon">
                <i class="bi ${fileTypeIcon}"></i>
            </div>
            <div class="attachment-info">
                <div class="attachment-name" title="${file.name}">${file.name}</div>
                <div class="attachment-size">${fileSize}</div>
                <div class="upload-progress">
                    <div class="upload-progress-bar" style="width: 100%"></div>
                </div>
            </div>
            <button type="button" class="attachment-remove">
                <i class="bi bi-trash"></i>
            </button>
        `;

        // Eliminar de la lista y del input
        attachmentItem.querySelector('.attachment-remove').addEventListener('click', () => {
            storedFiles = storedFiles.filter(f => f.name !== file.name || f.size !== file.size);
            attachmentItem.remove();
            updateFileInput();
        });

        attachmentsList.appendChild(attachmentItem);
    }

    // Actualizar el input file con los archivos acumulados
    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        storedFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;
    }

    // Tamaño legible
    function formatFileSize(bytes) {
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(1024));
        return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
    }

    // Icono según tipo
    function getFileTypeIcon(file) {
        if (file.type === 'application/pdf') return 'bi-file-earmark-pdf';
        if (file.type.includes('word')) return 'bi-file-earmark-word';
        if (file.type === 'text/plain') return 'bi-file-earmark-text';
        return 'bi-file-earmark';
    }
});
const resetFormBtn = document.getElementById('resetFormBtn');
const expedienteForm = document.getElementById('expedienteForm');

resetFormBtn.addEventListener('click', () => {
    // Limpia manualmente todos los campos
    expedienteForm.querySelectorAll('input, select, textarea').forEach(el => {
        if (el.type !== 'hidden') {
            el.value = '';
        }
    });

    // Limpia archivos
    storedFiles = [];
    attachmentsList.innerHTML = '';
    updateFileInput();

    // Limpia clases de validación y alertas
    expedienteForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    expedienteForm.querySelectorAll('.text-danger').forEach(el => el.classList.remove('text-danger'));
    const alert = document.querySelector('.alert-danger');
    if (alert) alert.remove();
});

</script>
</body>
</html>