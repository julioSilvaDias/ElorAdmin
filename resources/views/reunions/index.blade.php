@extends('layouts.general')

@section('content')
<h1>Lista de Reuniones</h1>
<a href="{{ route('reunions.create') }}">Crear nueva reunión</a>

<table>
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
                <a href="{{ route('reunions.show', $reunion) }}">Ver</a>
                <a href="{{ route('reunions.edit', $reunion) }}">Editar</a>
                <form action="{{ route('reunions.destroy', $reunion) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
