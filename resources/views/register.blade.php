<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro - Abasto y Comercio | Gobierno del Estado de México</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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

    body {
      background: var(--edomex-light);
      font-family: 'Inter', sans-serif;
      line-height: 1.6;
      min-height: 100vh;
      position: relative;
      color: #333;
    }

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

    .main-content {
      padding: 2rem 0 4rem;
      position: relative;
      z-index: 1;
    }

    .card-modern {
      border: none;
      border-radius: 16px;
      box-shadow: var(--shadow-medium);
      overflow: hidden;
      max-width: 600px;
      margin: 0 auto;
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

    .btn-edomex {
      background: var(--gradient-green);
      color: white;
      font-weight: 600;
      padding: 0.7rem 1.5rem;
      border-radius: 50px;
      box-shadow: var(--shadow-light);
      display: inline-flex;
      align-items: center;
      gap: 0.7rem;
      transition: all 0.3s ease;
      border: none;
    }

    .btn-edomex:hover {
      background: var(--edomex-green-dark);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-medium);
    }

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
      transition: all 0.3s ease;
    }

    .btn-edomex-outline:hover {
      background: var(--edomex-green);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-medium);
    }

    .form-control {
      border-radius: 8px;
      padding: 0.8rem 1rem;
      border: 1px solid #dee2e6;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--edomex-green);
      box-shadow: 0 0 0 0.25rem rgba(224, 10, 10, 0.25);
    }

    .input-group-text {
      background-color: var(--edomex-green-light);
      border-color: #dee2e6;
      color: var(--edomex-green);
    }

    .password-toggle {
      cursor: pointer;
      color: var(--edomex-gray);
      transition: color 0.3s ease;
    }

    .password-toggle:hover {
      color: var(--edomex-green);
    }

    .strength-meter {
      height: 4px;
      background: #e1e8e1;
      border-radius: 2px;
      margin-top: 8px;
      overflow: hidden;
    }

    .strength-fill {
      height: 100%;
      transition: all 0.3s ease;
      border-radius: 2px;
    }

    .strength-text {
      font-size: 12px;
      margin-top: 4px;
      font-weight: 500;
    }

    .alert {
      background: linear-gradient(135deg, #f8d7da 0%, #f5c2c7 100%);
      color: #721c24;
      padding: 16px 20px;
      border-radius: 8px;
      font-size: 14px;
      margin-bottom: 20px;
      border: 1px solid #f1aeb5;
      display: flex;
      align-items: center;
      gap: 10px;
    }

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

    .login-link {
      margin-top: 30px;
      text-align: center;
      padding: 20px;
      background: rgba(224, 10, 10, 0.05);
      border-radius: 8px;
      border: 1px solid rgba(224, 10, 10, 0.1);
    }

    .login-link a {
      color: var(--edomex-green);
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .login-link a:hover {
      color: var(--edomex-green-dark);
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .header-container {
        padding: 0.5rem 1rem;
      }
      
      .card-title-modern {
        font-size: 1.2rem;
      }
      
      .card-header-modern {
        padding: 1rem;
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
                    <div class="header-title">Sistema de Gestión</div>
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
  <div class="card card-modern">
    <div class="card-header-modern">
      <h2 class="card-title-modern">
        <i class="bi bi-person-plus"></i>
        Crear Cuenta
      </h2>
    </div>
    
    <div class="card-body">
      @if($errors->any())
        <div class="alert">
          <i class="bi bi-exclamation-triangle"></i>
          <div>
            @foreach($errors->all() as $error)
              <div>{{ $error }}</div>
            @endforeach
          </div>
        </div>
      @endif

      <form method="POST" action="/register" id="registerForm">
        @csrf
        
        <div class="mb-3">
          <label for="name" class="form-label">Nombre completo</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre completo" required value="{{ old('name') }}" />
          </div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Correo electrónico</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" required value="{{ old('email') }}" />
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required />
            <span class="input-group-text password-toggle" onclick="togglePassword('password', this)"><i class="bi bi-eye"></i></span>
          </div>
          <div class="strength-meter mt-2">
            <div class="strength-fill" id="strengthFill"></div>
          </div>
          <div class="strength-text" id="strengthText"></div>
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña" required />
            <span class="input-group-text password-toggle" onclick="togglePassword('password_confirmation', this)"><i class="bi bi-eye"></i></span>
          </div>
        </div>

        <button type="submit" class="btn btn-edomex w-100">
          <i class="bi bi-person-plus me-2"></i>
          Crear Cuenta
        </button>
      </form>

      <div class="login-link">
        ¿Ya tienes cuenta? <a href="/login">Inicia sesión aquí</a>
      </div>
    </div>
  </div>
</div>

<script>
    function togglePassword(inputId, icon) {
      const input = document.getElementById(inputId);
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      
      const eyeIcon = icon.querySelector('i');
      eyeIcon.classList.toggle('bi-eye');
      eyeIcon.classList.toggle('bi-eye-slash');
    }

    // Password strength checker
    document.getElementById('password').addEventListener('input', function(e) {
      const password = e.target.value;
      const strengthFill = document.getElementById('strengthFill');
      const strengthText = document.getElementById('strengthText');
      
      let strength = 0;
      let text = '';
      let color = '';
      
      if (password.length >= 8) strength++;
      if (/[a-z]/.test(password)) strength++;
      if (/[A-Z]/.test(password)) strength++;
      if (/[0-9]/.test(password)) strength++;
      if (/[^A-Za-z0-9]/.test(password)) strength++;
      
      switch(strength) {
        case 0:
        case 1:
          text = 'Muy débil';
          color = '#dc3545';
          break;
        case 2:
          text = 'Débil';
          color = '#fd7e14';
          break;
        case 3:
          text = 'Regular';
          color = '#ffc107';
          break;
        case 4:
          text = 'Fuerte';
          color = '#e00a0a';
          break;
        case 5:
          text = 'Muy fuerte';
          color = '#c00808';
          break;
      }
      
      strengthFill.style.width = (strength * 20) + '%';
      strengthFill.style.backgroundColor = color;
      strengthText.textContent = password.length > 0 ? text : '';
      strengthText.style.color = color;
    });

    // Form validation
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('password_confirmation').value;
      
      if (password !== confirmPassword) {
        e.preventDefault();
        alert('Las contraseñas no coinciden');
        return false;
      }
    });

    // Auto-format name input
    document.querySelector('input[name="name"]').addEventListener('input', function(e) {
      e.target.value = e.target.value.replace(/\b\w/g, l => l.toUpperCase());
    });
</script>

<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
</body>
</html>