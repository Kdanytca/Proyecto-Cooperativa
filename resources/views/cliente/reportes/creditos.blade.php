<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Reporte de Créditos</title>
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

        .resumen {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>📋 Reporte Personal de Créditos</h2>
    <p><strong>Cliente:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Fecha del reporte:</strong> {{ now()->format('d/m/Y') }}</p>

    <div class="resumen">
        <p><strong>Total de solicitudes:</strong> {{ $totalSolicitudes }}</p>
        <p><strong>Pendientes:</strong> {{ $totalPendientes }}</p>
        <p><strong>Aprobados:</strong> {{ $totalAprobados }}</p>
        <p><strong>Rechazados:</strong> {{ $totalRechazados }}</p>
        <p><strong>Total adeudado:</strong> ${{ number_format($totalAdeudado, 2) }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Monto</th>
                <th>Interés</th>
                <th>Plazo</th>
                <th>Estado</th>
                <th>Fecha solicitud</th>
                <th>Monto pendiente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($creditos as $c)
                <tr>
                    <td>${{ number_format($c->monto, 2) }}</td>
                    <td>{{ $c->interes }}%</td>
                    <td>{{ $c->plazo_meses }} meses</td>
                    <td>{{ ucfirst($c->estado) }}</td>
                    <td>{{ $c->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if ($c->estado === 'aprobado')
                            ${{ number_format($c->monto_pendiente, 2) }}
                        @else
                            —
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 20px; text-align: right;">Total de registros: {{ $creditos->count() }}</p>
</body>

</html>
