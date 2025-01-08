@extends('layouts.app')

@section('content')
<h1>Detalles del Horario</h1>

<table>
    <tr>
        <th>ID</th>
        <td>{{ $horario->id }}</td>
    </tr>
    <tr>
        <th>Día</th>
        <td>{{ $horario->{'dia-semana'} }}</td>
    </tr>
    <tr>
        <th>Hora</th>
        <td>{{ $horario->hora }}</td>
    </tr>
    <tr>
        <th>Profesor</th>
        <td>{{ $horario->profesor->name ?? 'Sin profesor' }}</td>
    </tr>
    <tr>
        <th>Asignatura</th>
        <td>{{ $horario->asignatura->nombre ?? 'Sin asignatura' }}</td>
    </tr>
</table>

<a href="{{ route('horarios.edit', $horario->id) }}">Editar</a>
<form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
</form>
<a href="{{ route('horarios.index') }}">Volver</a>
@endsection
