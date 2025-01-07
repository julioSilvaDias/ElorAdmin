@extends('layouts.app')

@section('content')
<h1>Lista de Horarios</h1>

<a href="{{ route('horarios.create') }}">Crear nuevo horario</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Día</th>
            <th>Hora</th>
            <th>Profesor</th>
            <th>Asignatura</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($horarios as $horario)
        <tr>
            <td>{{ $horario->id }}</td>
            <td>{{ $horario->{'dia-semana'} }}</td>
            <td>{{ $horario->hora }}</td>
            <td>{{ $horario->profesor->name ?? 'Sin profesor' }}</td>
            <td>{{ $horario->asignatura->nombre ?? 'Sin asignatura' }}</td>
            <td>
                <a href="{{ route('horarios.edit', $horario->id) }}">Editar</a>
                <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" style="display:inline;">
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
