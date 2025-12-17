<!DOCTYPE html>
<html>
<head>
    <title>Historial Global</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-left: 10px;
        }
        .btn-primary {
            background: #3A2C0F;
            color: white;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #3A2C0F;
            color: white;
        }
        tr:hover {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>📜 Historial Global de Mensajes</h1>
        <div>
            <a href="{{ route('admin.estadisticas') }}" class="btn btn-secondary">📊 Estadísticas</a>
            <a href="{{ route('admin.frases.index') }}" class="btn btn-secondary">Administrar Frases</a>
            <a href="{{ route('galleta.mostrar') }}" class="btn btn-primary">Volver a la Galleta</a>
        </div>
    </div>

    <p style="color: #666; margin-bottom: 20px;">
        Total de registros: <strong>{{ $historial->total() }}</strong>
    </p>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Fecha</th>
        </tr>
        </thead>
        <tbody>
        @foreach($historial as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ Str::limit($item->frase->mensaje, 80) }}</td>
                <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $historial->links() }}
    </div>
</div>
</body>
</html>
