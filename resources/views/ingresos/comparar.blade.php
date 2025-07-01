<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparar Ingresos - Abasto y Comercio</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --edomex-blue: rgb(224, 10, 10);
            --edomex-gold: #FFD700;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background: linear-gradient(135deg, var(--edomex-blue) 0%, rgba(241, 9, 9, 0.68) 100%);
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
    </style>
</head>
<body>
<header class="header mb-4">
    <div class="container">
        <div class="d-flex align-items-center">
            <img src="https://lerma.gob.mx/wp-content/uploads/logo_lerma.svg" alt="Gobierno del Estado de México" class="logo">
            <div class="title-container">
                <h1 class="h4 mb-0">Comparación de Ingresos</h1>
                <small>Abasto y Comercio</small>
            </div>
        </div>
    </div>
</header>

<div class="container mb-5">
    <div class="card card-shadow">
        <div class="card-header bg-white">
            <h2 class="h5 mb-0 text-primary"><i class="bi bi-graph-up me-2"></i>Comparar Ingresos por Año</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('ingresos.index') }}" class="btn btn-edomex-outline mb-3">
                <i class="bi bi-arrow-left me-1"></i> Regresar
            </a>
            <form method="GET" class="row g-2 mb-4">
                <div class="col-md-4">
                    <label>Año 1</label>
                    <input type="number" name="año1" class="form-control" value="{{ old('año1', request('año1')) }}" required>
                </div>
                <div class="col-md-4">
                    <label>Año 2</label>
                    <input type="number" name="año2" class="form-control" value="{{ old('año2', request('año2')) }}" required>
                </div>
                <div class="col-md-4 align-self-end">
                    <button type="submit" class="btn btn-edomex w-100">Comparar</button>
                </div>
            </form>

            @if(isset($ingresos1) && isset($ingresos2))
                <canvas id="ingresosChart" height="100"></canvas>

                <table class="table table-bordered mt-4">
                    <thead class="table-light">
                        <tr>
                            <th>Mes</th>
                            <th>Ingreso {{ $año1 }}</th>
                            <th>Ingreso {{ $año2 }}</th>
                            <th>Diferencia ({{ $año2 }} - {{ $año1 }})</th>
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
                                <td>{{ ucfirst($meses[$i-1]) }}</td>
                                <td>${{ number_format($cantidad1, 2) }}</td>
                                <td>${{ number_format($cantidad2, 2) }}</td>
                                <td style="color: {{ $diff >= 0 ? 'green' : 'red' }};">
                                    ${{ number_format($diff, 2) }}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot class="table-secondary fw-bold">
                        <tr>
                            <td>Total anual</td>
                            <td>${{ number_format($total1, 2) }}</td>
                            <td>${{ number_format($total2, 2) }}</td>
                            <td style="color: {{ $totalDiff >= 0 ? 'green' : 'red' }};">
                                ${{ number_format($totalDiff, 2) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>

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
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    tension: 0.3,
                                    pointRadius: 5,
                                    pointHoverRadius: 7
                                },
                                {
                                    label: '{{ $año2 }}',
                                    data: [
                                        @for($i = 1; $i <= 12; $i++)
                                            {{ $ingresos2[$i]->cantidad ?? 0 }},
                                        @endfor
                                    ],
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    tension: 0.3,
                                    pointRadius: 5,
                                    pointHoverRadius: 7
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Comparativo de Ingresos Mensuales - {{ $año1 }} vs {{ $año2 }}',
                                    font: {
                                        size: 18
                                    }
                                },
                                legend: {
                                    position: 'top'
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Cantidad en pesos'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Meses del año'
                                    }
                                }
                            }
                        }
                    });
                </script>
            @endif
        </div>
    </div>
</div>

<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>

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
