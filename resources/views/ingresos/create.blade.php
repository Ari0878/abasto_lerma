<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Ingreso</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        :root {
            --edomex-blue: rgb(224, 10, 10);
            --edomex-red: #E4002B;
            --edomex-white: #FFFFFF;
            --edomex-gold: #FFD700;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background: linear-gradient(135deg, var(--edomex-blue) 0%, rgb(241, 9, 9) 100%);
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
            box-shadow: 0 4px 8px rgba(241, 9, 9, 0.68);
            border-radius: 8px;
            border: none;
            background-color: white;
            padding: 2rem;
        }

        .btn-edomex {
            background-color: var(--edomex-blue);
            color: white;
            border: none;
        }

        .btn-edomex:hover {
            background-color: rgb(180, 0, 0);
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

        .footer {
            background-color: var(--edomex-blue);
            color: white;
            padding: 1.5rem 0;
            margin-top: 2rem;
            font-size: 0.9rem;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header class="header">
        <div class="container d-flex align-items-center">
            <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo">
            <div class="title-container">
                <h4 class="mb-0">Gobierno del Estado de México</h4>
                <small>Registro de Ingresos</small>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <div class="container py-5">
        <div class="card-shadow">
            <h2 class="mb-4">Registrar Ingreso</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('ingresos.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="mes" class="form-label">Mes</label>
                    <select name="mes" id="mes" class="form-select" required>
                        @php
                            $meses = [
                                1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo',
                                4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
                                7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre',
                                10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                            ];
                        @endphp
                        @foreach($meses as $num => $nombre)
                            <option value="{{ $num }}">{{ $nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="año" class="form-label">Año</label>
                    <input type="number" name="año" id="año" class="form-control" value="{{ date('Y') }}" required min="2000" max="2100">
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad ($)</label>
                    <input type="number" step="0.01" name="cantidad" id="cantidad" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-edomex"><i class="bi bi-save"></i> Guardar</button>
                <a href="{{ route('ingresos.index') }}" class="btn btn-edomex-outline"><i class="bi bi-x-circle"></i> Cancelar</a>
            </form>
        </div>
    </div>
<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
    <!-- Pie de página -->
    <!--<footer class="footer">-->
    <!--    © {{ date('Y') }} Gobierno del Estado de México · Secretaría de Finanzas-->
    <!--</footer>-->

</body>

</html>
