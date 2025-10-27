<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Créditos</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            color: #155724;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #e6f4ea;
        }
    </style>
</head>

<body>
    <h2>📋 Reporte de Créditos ({{ ucfirst($tipo) }})</h2>
    @if ($fechaInicio && $fechaFin)
        <p>Período: {{ $fechaInicio }} a {{ $fechaFin }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Monto</th>
                <th>Plan</th>
                <th>Plazo</th>
                <th>Interés</th>
                <th>Estado</th>
                <th>Fecha de Solicitud</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($creditos as $c)
                <tr>
                    <td>{{ $c->user->name }}</td>
                    <td>${{ number_format($c->monto, 2) }}</td>
                    <td>{{ $c->plan }}</td>
                    <td>{{ $c->plazo_meses }} meses</td>
                    <td>{{ $c->interes }}%</td>
                    <td>{{ ucfirst($c->estado) }}</td>
                    <td>{{ $c->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 20px; text-align: right;">Total de registros: {{ $creditos->count() }}</p>
</body>

</html>
