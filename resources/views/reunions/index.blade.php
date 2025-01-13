@extends('layouts.general')

@section('content')
<div class="container">
    <h1>Lista de Reuniones</h1>

    <!-- Botón para crear nueva reunión -->
    <a href="{{ route('reunions.create') }}" class="btn btn-primary mb-3">Crear nueva reunión</a>

    <!-- Tabla de reuniones -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Comentario</th>
                <th>Estado</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Emisor</th>
                <th>Receptor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reunions as $reunion)
            <tr>
                <td>{{ $reunion->id }}</td>
                <td>{{ $reunion->comentario }}</td>
                <td>{{ $reunion->estado }}</td>
                <td>{{ $reunion->fecha_hora_inicio }}</td>
                <td>{{ $reunion->fecha_hora_fin }}</td>
                <td>{{ $reunion->emisor?->name ?? 'Sin emisor' }}</td>
                <td>{{ $reunion->receptor?->name ?? 'Sin receptor' }}</td>
                <td>
                    <!-- Botón Ver -->
                    <a href="{{ route('reunions.show', $reunion) }}" class="btn btn-info btn-sm">Ver</a>
                    
                    <!-- Botón Editar -->
                    <a href="{{ route('reunions.edit', $reunion) }}" class="btn btn-warning btn-sm">Editar</a>
                    
                    <!-- Formulario de Eliminar -->
                    <form action="{{ route('reunions.destroy', $reunion) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
