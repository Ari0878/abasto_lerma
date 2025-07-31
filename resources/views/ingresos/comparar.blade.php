<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Escudo_de_Lerma_%28estado_de_Mexico%29.svg/1076px-Escudo_de_Lerma_%28estado_de_Mexico%29.svg.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Comparar Ingresos - Finanzas</title>

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
        
        /* Tabla mejorada */
        .table-modern {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-light);
        }
        
        .table-modern thead th {
            background-color: var(--edomex-green);
            color: white;
            font-weight: 600;
            border-bottom: 2px solid var(--edomex-gold);
        }
        
        .table-modern tbody tr:hover {
            background-color: var(--edomex-green-light);
        }
        
        .table-modern tfoot {
            background-color: rgba(224, 10, 10, 0.1);
            font-weight: 600;
        }
        
        /* Gráfico mejorado */
        .chart-container {
            position: relative;
            height: 400px;
            margin-bottom: 2rem;
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
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
            
            .chart-container {
                height: 300px;
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
            
            .chart-container {
                height: 250px;
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
                    <div class="header-title">Comparación de Ingresos</div>
                    <div class="header-subtitle">Secretaría de Finanzas</div>
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
                    <i class="bi bi-graph-up-arrow"></i>
                    Comparativo de Ingresos Anuales
                </h2>
                <small class="text-muted">Seleccione los años a comparar</small>
            </div>
        </div>
        
        <div class="card-body">
            <a href="{{ route('ingresos.index') }}" class="btn btn-edomex-outline mb-4">
                <i class="bi bi-arrow-left me-1"></i> Regresar
            </a>
            
            <form method="GET" class="row g-3 mb-5">
                <div class="col-md-5">
                    <label for="año1" class="form-label">Primer Año</label>
                    <input type="number" id="año1" name="año1" class="form-control" 
                           value="{{ old('año1', request('año1')) }}" min="2000" max="2100" required>
                </div>
                <div class="col-md-5">
                    <label for="año2" class="form-label">Segundo Año</label>
                    <input type="number" id="año2" name="año2" class="form-control" 
                           value="{{ old('año2', request('año2')) }}" min="2000" max="2100" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-edomex w-100">
                        <i class="bi bi-arrow-repeat me-1"></i> Comparar
                    </button>
                </div>
            </form>

            @if(isset($ingresos1) && isset($ingresos2))
                <div class="chart-container mb-5">
                    <canvas id="ingresosChart"></canvas>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Mes</th>
                                <th class="text-end">Ingreso {{ $año1 }}</th>
                                <th class="text-end">Ingreso {{ $año2 }}</th>
                                <th class="text-end">Diferencia ({{ $año2 }} - {{ $año1 }})</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total1 = 0;
                                $total2 = 0;
                                $totalDiff = 0;
                            @endphp
                            @for($i = 1; $i <= 12; $i++)
                                @php
                                    $cantidad1 = $ingresos1[$i]->cantidad ?? 0;
                                    $cantidad2 = $ingresos2[$i]->cantidad ?? 0;
                                    $diff = $cantidad2 - $cantidad1;

                                    $total1 += $cantidad1;
                                    $total2 += $cantidad2;
                                    $totalDiff += $diff;
                                @endphp
                                <tr>
                                    <td class="text-center">{{ ucfirst($meses[$i-1]) }}</td>
                                    <td class="text-end">${{ number_format($cantidad1, 2) }}</td>
                                    <td class="text-end">${{ number_format($cantidad2, 2) }}</td>
                                    <td class="text-end" style="color: {{ $diff >= 0 ? 'var(--edomex-green)' : '#dc3545' }};">
                                        ${{ number_format($diff, 2) }}
                                        @if($diff != 0)
                                            <i class="bi bi-arrow-{{ $diff >= 0 ? 'up' : 'down' }}-circle ms-1"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">Total Anual</th>
                                <th class="text-end">${{ number_format($total1, 2) }}</th>
                                <th class="text-end">${{ number_format($total2, 2) }}</th>
                                <th class="text-end" style="color: {{ $totalDiff >= 0 ? 'var(--edomex-green)' : '#dc3545' }};">
                                    ${{ number_format($totalDiff, 2) }}
                                    @if($totalDiff != 0)
                                        <i class="bi bi-arrow-{{ $totalDiff >= 0 ? 'up' : 'down' }}-circle ms-1"></i>
                                    @endif
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('ingresosChart').getContext('2d');
                    const chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [
                                @foreach($meses as $mes)
                                    '{{ ucfirst($mes) }}',
                                @endforeach
                            ],
                            datasets: [
                                {
                                    label: '{{ $año1 }}',
                                    data: [
                                        @for($i = 1; $i <= 12; $i++)
                                            {{ $ingresos1[$i]->cantidad ?? 0 }},
                                        @endfor
                                    ],
                                    borderColor: 'rgba(99, 102, 241, 1)',
                                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                                    borderWidth: 2,
                                    tension: 0.3,
                                    pointRadius: 4,
                                    pointHoverRadius: 6,
                                    pointBackgroundColor: 'white',
                                    pointBorderColor: 'rgba(99, 102, 241, 1)'
                                },
                                {
                                    label: '{{ $año2 }}',
                                    data: [
                                        @for($i = 1; $i <= 12; $i++)
                                            {{ $ingresos2[$i]->cantidad ?? 0 }},
                                        @endfor
                                    ],
                                    borderColor: 'rgba(224, 10, 10, 1)',
                                    backgroundColor: 'rgba(224, 10, 10, 0.1)',
                                    borderWidth: 2,
                                    tension: 0.3,
                                    pointRadius: 4,
                                    pointHoverRadius: 6,
                                    pointBackgroundColor: 'white',
                                    pointBorderColor: 'rgba(224, 10, 10, 1)'
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Comparativo de Ingresos Mensuales',
                                    font: {
                                        size: 18,
                                        weight: 'bold'
                                    },
                                    padding: {
                                        bottom: 20
                                    }
                                },
                                legend: {
                                    position: 'top',
                                    labels: {
                                        boxWidth: 12,
                                        padding: 20,
                                        font: {
                                            weight: '600'
                                        },
                                        usePointStyle: true
                                    }
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false,
                                    backgroundColor: 'rgba(0,0,0,0.8)',
                                    titleFont: {
                                        size: 14,
                                        weight: 'bold'
                                    },
                                    bodyFont: {
                                        size: 13
                                    },
                                    padding: 12,
                                    callbacks: {
                                        label: function(context) {
                                            return context.dataset.label + ': $' + context.raw.toLocaleString('es-MX', {
                                                minimumFractionDigits: 2,
                                                maximumFractionDigits: 2
                                            });
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Cantidad (MXN)',
                                        font: {
                                            weight: '600'
                                        }
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return '$' + value.toLocaleString('es-MX');
                                        }
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Meses del año',
                                        font: {
                                            weight: '600'
                                        }
                                    },
                                    grid: {
                                        display: false
                                    }
                                }
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index'
                            }
                        }
                    });
                </script>
            @endif
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
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