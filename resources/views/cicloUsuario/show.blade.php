@extends('layouts.general')

@section('content')
<div class="container">
    <h1>Detalles del Ciclo Usuario</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $cicloUsuario->id }} </p>
            <p><strong>Fecha Matrícula:</strong> {{ $cicloUsuario->fecha_matricula }}</p>
            <p><strong>Nombre Ciclo:</strong> {{ $cicloUsuario->ciclo ? $cicloUsuario->ciclo->nombre : 'No disponible' }}</p>
            <p><strong>Nombre Usuario:</strong> {{ $cicloUsuario->usuario ? $cicloUsuario->usuario->name : 'No disponible' }}</p>
        </div>
    </div>

    <!-- Botón de editar -->
    <a href="{{ route('ciclo_usuario.edit', $cicloUsuario->id) }}" class="btn btn-primary mt-3">Editar</a>
</div>
@endsection
