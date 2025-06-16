<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro - Abasto y Comercio | Gobierno del Estado de México</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
  <style>
    :root {
      --edomex-green: rgba(241, 9, 9, 0.68);
      --edomex-green-dark: rgb(224, 10, 10);
      --edomex-gold: #FFD700;
      --bg-gradient: linear-gradient(135deg, #e8f5e8 0%, #f0f8f0 50%, #e1f4e1 100%);
      --form-bg: rgba(255, 255, 255, 0.95);
      --input-border: #e1e8e1;
      --text-color: #2c3e50;
      --text-muted: #6c757d;
      --shadow-light: 0 4px 20px rgba(23, 193, 36, 0.1);
      --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
      --radius: 20px;
      --radius-small: 12px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--bg-gradient);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(23,193,36,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
      opacity: 0.5;
    }

    .form-container {
      background: var(--form-bg);
      backdrop-filter: blur(20px);
      padding: 50px 40px;
      border-radius: var(--radius);
      box-shadow: var(--shadow-medium);
      width: 100%;
      max-width: 480px;
      position: relative;
      z-index: 2;
      border: 1px solid rgba(23, 193, 36, 0.1);
      animation: slideUp 0.8s ease-out;
      margin-top: 60px; /* Espacio para el botón en móvil */
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .form-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--edomex-green) 0%, var(--edomex-gold) 100%);
      border-radius: var(--radius) var(--radius) 0 0;
    }

    .header-section {
      text-align: center;
      margin-bottom: 40px;
    }

    .logo-container {
      margin-bottom: 20px;
    }

    .logo-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      box-shadow: var(--shadow-light);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }

    .logo-icon i {
      font-size: 2.5rem;
      color: white;
    }

    h2 {
      margin-bottom: 8px;
      color: var(--text-color);
      font-size: 28px;
      font-weight: 700;
      background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .subtitle {
      color: var(--text-muted);
      font-size: 16px;
      font-weight: 400;
      margin-bottom: 30px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .input-group {
      position: relative;
    }

    .input-group i {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--edomex-green);
      font-size: 1.1rem;
      z-index: 2;
    }

    input {
      width: 100%;
      padding: 16px 16px 16px 50px;
      border: 2px solid var(--input-border);
      border-radius: var(--radius-small);
      font-size: 16px;
      font-weight: 400;
      outline: none;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(10px);
    }

    input:focus {
      border-color: var(--edomex-green);
      box-shadow: 0 0 0 4px rgba(23, 193, 36, 0.1);
      background: white;
      transform: translateY(-2px);
    }

    input::placeholder {
      color: var(--text-muted);
      font-weight: 400;
    }

    .password-toggle {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: var(--text-muted);
      font-size: 1.1rem;
      transition: color 0.3s ease;
    }

    .password-toggle:hover {
      color: var(--edomex-green);
    }

    button {
      background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
      color: white;
      padding: 18px;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: var(--radius-small);
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      box-shadow: var(--shadow-light);
    }

    button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }

    button:hover::before {
      left: 100%;
    }

    button:hover {
      background: linear-gradient(135deg, var(--edomex-green-dark) 0%, var(--edomex-green) 100%);
      transform: translateY(-2px);
      box-shadow: var(--shadow-medium);
    }

    button:active {
      transform: translateY(0);
    }

    .login-link {
      margin-top: 30px;
      text-align: center;
      padding: 20px;
      background: rgba(23, 193, 36, 0.05);
      border-radius: var(--radius-small);
      border: 1px solid rgba(23, 193, 36, 0.1);
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

    .back-btn {
      position: fixed; /* Cambiado de absolute a fixed */
      top: 20px;
      left: 20px;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(23, 193, 36, 0.2);
      border-radius: 50px;
      padding: 12px 20px;
      text-decoration: none;
      color: var(--edomex-green);
      font-weight: 500;
      transition: all 0.3s ease;
      z-index: 10;
    }

    .back-btn:hover {
      background: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-light);
      color: var(--edomex-green-dark);
    }

    .back-btn i {
      margin-right: 8px;
    }

    .alert {
      background: linear-gradient(135deg, #f8d7da 0%, #f5c2c7 100%);
      color: #721c24;
      padding: 16px 20px;
      border-radius: var(--radius-small);
      font-size: 14px;
      margin-bottom: 20px;
      border: 1px solid #f1aeb5;
      display: flex;
      align-items: center;
      gap: 10px;
      animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
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

    @media (max-width: 768px) {
      .form-container {
        padding: 40px 30px;
        max-width: 100%;
        margin: 60px 20px 20px; /* Ajuste del margen superior */
      }

      h2 {
        font-size: 24px;
      }

      /* Eliminamos el estilo que cambiaba la posición del botón */
      /* El botón ahora permanece fixed en la parte superior */
    }
  </style>
</head>
<body>

  <a href="{{ route('welcome') }}" class="back-btn">
    <i class="bi bi-arrow-left"></i> Volver al inicio
  </a>

  <div class="form-container">
    <div class="header-section">
      <div class="logo-container">
        <div class="logo-icon">
          <i class="bi bi-person-plus"></i>
        </div>
      </div>
      <h2>Crear Cuenta</h2>
      <p class="subtitle">Regístrate para acceder al sistema de gestión</p>
    </div>

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
      
      <div class="input-group">
        <i class="bi bi-person"></i>
        <input type="text" name="name" placeholder="Nombre completo" required value="{{ old('name') }}" />
      </div>

      <div class="input-group">
        <i class="bi bi-envelope"></i>
        <input type="email" name="email" placeholder="Correo electrónico" required value="{{ old('email') }}" />
      </div>

      <div class="input-group">
        <i class="bi bi-lock"></i>
        <input type="password" name="password" id="password" placeholder="Contraseña" required />
        <i class="bi bi-eye password-toggle" onclick="togglePassword('password', this)"></i>
        <div class="strength-meter">
          <div class="strength-fill" id="strengthFill"></div>
        </div>
        <div class="strength-text" id="strengthText"></div>
      </div>

      <div class="input-group">
        <i class="bi bi-lock-fill"></i>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña" required />
        <i class="bi bi-eye password-toggle" onclick="togglePassword('password_confirmation', this)"></i>
      </div>

      <button type="submit">
        <i class="bi bi-person-plus me-2"></i>
        Crear Cuenta
      </button>
    </form>

    <div class="login-link">
      ¿Ya tienes cuenta? <a href="/login">Inicia sesión aquí</a>
    </div>
  </div>

  <script>
    function togglePassword(inputId, icon) {
      const input = document.getElementById(inputId);
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      
      icon.classList.toggle('bi-eye');
      icon.classList.toggle('bi-eye-slash');
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
          color = 'rgba(241, 9, 9, 0.68)';
          break;
        case 5:
          text = 'Muy fuerte';
          color = 'rgb(224, 10, 10)';
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

</body>
</html>