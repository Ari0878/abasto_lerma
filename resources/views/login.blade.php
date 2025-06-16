<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Abasto y Comercio | Gobierno del Estado de México</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />

    <style>
        :root {
            --edomex-green: rgba(241, 9, 9, 0.68);
            --edomex-green-dark: rgb(224, 10, 10);
            --edomex-gold: #FFD700;
            --bg-gradient: linear-gradient(135deg, #e8f5e8 0%, #f0f8f0 50%, #e1f4e1 100%);
            --card-bg: rgba(255, 255, 255, 0.95);
            --text-color: #2c3e50;
            --text-muted: #6c757d;
            --shadow-light: 0 4px 20px rgba(23, 193, 36, 0.1);
            --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
            --radius: 20px;
            --radius-small: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .card {
            display: flex;
            flex-direction: row;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border-radius: var(--radius);
            box-shadow: var(--shadow-medium);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            position: relative;
            z-index: 2;
            border: 1px solid rgba(23, 193, 36, 0.1);
            animation: slideUp 0.8s ease-out;
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

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--edomex-green) 0%, var(--edomex-gold) 100%);
            z-index: 3;
        }

        .card .left {
            flex: 1;
            background: linear-gradient(135deg, rgba(241, 9, 9, 0.68) 0%, rgba(241, 9, 9, 0.92) 100%), 
                        url("https://lerma.gob.mx/wp-content/uploads/0871.jpg") center/cover no-repeat;
            min-height: 500px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 40px;
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .left-content h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .left-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            line-height: 1.6;
            text-shadow: 0 1px 5px rgba(0,0,0,0.3);
        }

        .left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hexagons" width="50" height="43.4" patternUnits="userSpaceOnUse"><polygon points="25,0 50,14.4 50,28.9 25,43.4 0,28.9 0,14.4" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23hexagons)"/></svg>');
            opacity: 0.3;
        }

        .card .right {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            margin-bottom: 30px;
            font-size: 16px;
            color: var(--edomex-green);
            text-decoration: none;
            transition: all 0.3s ease;
            background: rgba(23, 193, 36, 0.1);
            padding: 10px 16px;
            border-radius: 50px;
            font-weight: 500;
            width: fit-content;
        }

        .back-btn:hover {
            color: var(--edomex-green-dark);
            background: rgba(23, 193, 36, 0.2);
            transform: translateX(-5px);
        }

        .back-btn i {
            margin-right: 8px;
        }

        .header-section {
            margin-bottom: 40px;
        }

        .right h2 {
            color: var(--text-color);
            font-size: 32px;
            margin-bottom: 8px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .right .subtitle {
            font-size: 16px;
            margin-bottom: 30px;
            color: var(--text-muted);
            font-weight: 400;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--edomex-green);
            font-size: 1.2rem;
            z-index: 2;
        }

        input {
            width: 100%;
            padding: 18px 18px 18px 55px;
            border: 2px solid #e1e8e1;
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
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-muted);
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--edomex-green);
        }

        button {
            padding: 18px;
            background: linear-gradient(135deg, var(--edomex-green) 0%, var(--edomex-green-dark) 100%);
            border: none;
            color: white;
            font-weight: 600;
            font-size: 16px;
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

        .register {
            margin-top: 30px;
            text-align: center;
            font-size: 16px;
            padding: 20px;
            background: rgba(23, 193, 36, 0.05);
            border-radius: var(--radius-small);
            border: 1px solid rgba(23, 193, 36, 0.1);
        }

        .register a {
            color: var(--edomex-green);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register a:hover {
            color: var(--edomex-green-dark);
            text-decoration: underline;
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

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: var(--edomex-green);
        }

        @media (max-width: 768px) {
            .card {
                flex-direction: column;
                max-width: 100%;
                margin: 0 10px;
            }

            .card .left {
                height: 250px;
                padding: 30px 20px;
            }

            .left-content h3 {
                font-size: 2rem;
            }

            .left-content p {
                font-size: 1rem;
            }

            .card .right {
                padding: 40px 30px;
            }

            .right h2 {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .card .right {
                padding: 30px 20px;
            }

            input {
                padding: 16px 16px 16px 50px;
            }

            button {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="left">
            <div class="left-content">
                <h3>Bienvenido</h3>
                <p>Sistema de Gestión de Expedientes<br>Dirección de Abasto y Comercio</p>
            </div>
        </div>

        <div class="right">
            <a href="{{ route('welcome') }}" class="back-btn">
                <i class="bi bi-arrow-left"></i> Volver al inicio
            </a>
            
            <div class="header-section">
                <h2>Iniciar Sesión</h2>
                <p class="subtitle">Accede a tu cuenta para gestionar expedientes</p>
            </div>

            @if(session('error'))
            <div class="alert">
                <i class="bi bi-exclamation-triangle"></i>
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="input-group">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="email" placeholder="Correo electrónico" required value="{{ old('email') }}">
                </div>

                <div class="input-group">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Contraseña" required>
                    
                </div>

                <div class="forgot-password">
                    <a href="#" onclick="alert('Contacta al administrador del sistema')">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Iniciar Sesión
                </button>
            </form>

            <div class="register">
                ¿No tienes cuenta? <a href="{{ url('/register') }}">Regístrate aquí</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }

        // Auto-focus en el primer input
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('input[name="email"]').focus();
        });

        // Prevenir cache en navegación
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });

        // Animación de entrada para elementos
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.card');
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.8s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html>