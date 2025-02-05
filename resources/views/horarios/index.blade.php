@extends('layouts.general')

@section('content')
<div class="container">
    <h1>Horarios</h1>

    <a href="{{ route('horarios.create') }}"class="btn btn-primary mb-3">Crear nuevo horario</a>

    <table class="table table-bordered">
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
                        <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" style="display:inline;">
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