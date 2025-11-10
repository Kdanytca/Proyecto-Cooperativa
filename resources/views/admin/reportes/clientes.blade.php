<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Clientes</title>
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

        .completo {
            color: #155724;
            font-weight: bold;
        }

        .incompleto {
            color: #a71d2a;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>👥 Reporte de Clientes ({{ ucfirst($estadoPerfil) }})</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Salario</th>
                <th>Estado del Perfil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->perfilCrediticio?->telefono ?? 'N/A' }}</td>
                    <td>{{ $c->perfilCrediticio?->salario ? '$' . number_format($c->perfilCrediticio->salario, 2) : 'N/A' }}
                    </td>
                    <td class="{{ $c->perfil_completo ? 'completo' : 'incompleto' }}">
                        {{ $c->perfil_completo ? 'Completo' : 'Incompleto' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 20px; text-align: right;">Total de clientes: {{ $clientes->count() }}</p>
</body>

</html>