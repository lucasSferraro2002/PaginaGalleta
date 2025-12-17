<!DOCTYPE html>
<html>
<head>
    <title>Administrar Frases</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }
        h1 {
            color: #333;
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
        }
        .btn-primary {
            background: #3A2C0F;
            color: white;
        }
        .btn-success {
            background: #28a745;
            color: white;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn-warning {
            background: #ffc107;
            color: black;
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
        .actions {
            display: flex;
            gap: 10px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Administrar Frases de la Fortuna</h1>
        <div>
            <a href="{{ route('admin.historial-global') }}" class="btn btn-secondary">📜 Historial Global</a>
            <a href="{{ route('admin.estadisticas') }}" class="btn btn-warning">📊 Estadísticas</a>
            <a href="{{ route('galleta.mostrar') }}" class="btn btn-primary">Ver Galleta</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.frases.create') }}" class="btn btn-success">+ Crear Nueva Frase</a>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Mensaje</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($frases as $frase)
            <tr>
                <td>{{ $frase->id }}</td>
                <td>{{ $frase->mensaje }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.frases.edit', $frase->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.frases.destroy', $frase->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar esta frase?')">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
