<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Abasto y Comercio | Gobierno del Estado de México</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">

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
            --radius: 12px;
            --radius-small: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--edomex-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #333;
            position: relative;
        }

        /* Header */
        .header-gobierno {
            background: var(--gradient-green);
            border-bottom: 4px solid var(--edomex-gold);
            box-shadow: var(--shadow-medium);
            padding: 0.5rem 2rem;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo {
            height: 60px;
            filter: brightness(0) invert(1);
        }

        .header-titles {
            color: white;
        }

        .header-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .header-subtitle {
            font-size: 0.85rem;
            opacity: 0.9;
            font-weight: 400;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        /* Card */
        .card-modern {
            width: 100%;
            max-width: 1000px;
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--shadow-heavy);
            overflow: hidden;
            display: flex;
            flex-direction: row;
        }

        .card-left {
            flex: 1;
            background: linear-gradient(135deg, rgba(224, 10, 10, 0.6) 0%, rgba(192, 8, 8, 0.95) 100%), 
                        url("https://lerma.gob.mx/wp-content/uploads/0871.jpg") center/cover no-repeat;
            padding: 3rem;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .card-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hexagons" width="50" height="43.4" patternUnits="userSpaceOnUse"><polygon points="25,0 50,14.4 50,28.9 25,43.4 0,28.9 0,14.4" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23hexagons)"/></svg>');
            opacity: 0.3;
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .left-content h3 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .left-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
            text-shadow: 0 1px 5px rgba(0,0,0,0.3);
        }

        .card-right {
            flex: 1;
            background: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Form */
        .form-header {
            margin-bottom: 2rem;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--edomex-green-dark);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .form-header p {
            color: var(--edomex-gray);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            font-weight: 500;
            color: var(--edomex-green-dark);
            margin-bottom: 0.5rem;
            display: block;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--edomex-green);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 3rem;
            border: 1px solid #ced4da;
            border-radius: var(--radius-small);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--edomex-green);
            box-shadow: 0 0 0 0.25rem rgba(224, 10, 10, 0.25);
            outline: none;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--edomex-gray);
        }

        .password-toggle:hover {
            color: var(--edomex-green);
        }

        /* Buttons */
        .btn-edomex {
            background: var(--gradient-green);
            color: white;
            font-weight: 600;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            border: none;
            box-shadow: var(--shadow-light);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.7rem;
            transition: all 0.3s ease;
            border: 2px solid rgba(255,255,255,0.3);
            margin-top: 1rem;
        }

        .btn-edomex:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
            color: white;
            background: linear-gradient(135deg, var(--edomex-green-dark) 0%, var(--edomex-green) 100%);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--edomex-green);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            color: var(--edomex-green-dark);
            transform: translateX(-5px);
        }

        /* Links */
        .forgot-password {
            text-align: right;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
        }

        .forgot-password a {
            color: var(--edomex-gray);
            font-size: 0.85rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: var(--edomex-green);
            text-decoration: underline;
        }

        .register-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(0,0,0,0.1);
            color: var(--edomex-gray);
            font-size: 0.95rem;
        }

        .register-link a {
            color: var(--edomex-green);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: var(--edomex-green-dark);
            text-decoration: underline;
        }

        /* Alert */
        .alert {
            border-radius: var(--radius-small);
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Wave Background */
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
            .card-modern {
                flex-direction: column;
                max-width: 600px;
            }
            
            .card-left {
                padding: 2rem;
                min-height: 300px;
            }
            
            .card-right {
                padding: 2rem;
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
            
            .card-left, .card-right {
                padding: 1.5rem;
            }
            
            .left-content h3 {
                font-size: 1.8rem;
            }
            
            .left-content p {
                font-size: 1rem;
            }
            
            .form-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header-gobierno">
        <div class="header-container">
            <div class="logo-container">
                <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo" />
                <div class="header-titles">
                    <div class="header-title">Sistema de Gestión de Expedientes</div>
                    <div class="header-subtitle">Dirección de Abasto y Comercio</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="card-modern">
            <div class="card-left">
                <div class="left-content">
                    <h3>Bienvenido</h3>
                    <p>Sistema de Gestión de Expedientes<br>Dirección de Abasto y Comercio</p>
                </div>
            </div>

            <div class="card-right">
                <a href="{{ route('welcome') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Volver al inicio
                </a>
                
                <div class="form-header">
                    <h2><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</h2>
                    <p>Accede a tu cuenta para gestionar expedientes</p>
                </div>

                @if(session('error'))
                <div class="alert">
                    <i class="bi bi-exclamation-triangle"></i>
                    {{ session('error') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Correo electrónico</label>
                        <div class="input-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Contraseña</label>
                        <div class="input-icon">
                            <i class="bi bi-lock"></i>
                        </div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                        <i class="bi bi-eye password-toggle" id="togglePassword"></i>
                    </div>

                    <div class="forgot-password">
                        <a href="#" onclick="alert('Contacta al administrador del sistema')">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn-edomex">
                        <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                    </button>
                </form>

                <div class="register-link">
                    ¿No tienes cuenta? <a href="{{ url('/register') }}">Regístrate aquí</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave Background -->
    <div class="wave-bg"></div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });

        // Auto-focus on email input
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.querySelector('input[name="email"]');
            if (emailInput) {
                emailInput.focus();
            }
        });

        // Prevent cache on navigation
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>