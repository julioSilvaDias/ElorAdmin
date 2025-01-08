<!-- resources/views/ciclo-usuario/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ciclo Usuarios</h1>

    <!-- Botón para crear -->
    <a href="{{ route('ciclo_usuario.create') }}" class="btn btn-primary mb-3">Crear Ciclo Usuario</a>

    <!-- Lista -->
    <ul class="list-group">
        @foreach($cicloUsuarios as $cicloUsuario)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <!-- ID, Fecha Matrícula, Nombre del Ciclo y Nombre del Usuario -->
                <div>
                    <strong>ID:</strong> {{ $cicloUsuario->id }} <br>                                                       
                    <strong>Fecha Matrícula:</strong> {{ $cicloUsuario->{'fecha-matricula'} }} <br>
                    <strong>Nombre Ciclo:</strong>
                    @if ($cicloUsuario->ciclo)
                        {{ $cicloUsuario->ciclo->nombre }}
                    @else
                        <span class="text-muted">Ciclo no disponible</span>
                    @endif
                    <br>
                    <strong>Nombre del Usuario:</strong>
                    @if ($cicloUsuario->user)
                        {{ $cicloUsuario->user->name }}
                    @else
                        <span class="text-muted">Usuario no disponible</span>
                    @endif
                    <br>
                    <span class="text-muted">Escrito el {{ $cicloUsuario->created_at->format('Y-m-d H:i:s') }}</span>
                </div>

                <!-- Botones de editar y borrar -->
                <div>
                    <!-- Editar -->
                    <a href="{{ route('ciclo_usuario.update', $cicloUsuario->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <!-- Eliminar -->
                    <form action="{{ route('ciclo_usuario.destroy', $cicloUsuario->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este ciclo de usuario?')">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
