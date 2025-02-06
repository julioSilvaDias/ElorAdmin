@extends('layouts.general')

@section('content')
<div class="container">
    <h1>Matriculas</h1>

    <!-- Botón para crear -->
    <a href="{{ route('ciclo_usuario.create') }}" class="btn btn-primary mb-3">Crear Ciclo Usuario</a>

    <!-- Lista -->
    <ul class="list-group">
        @foreach($cicloUsuarios as $cicloUsuario)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>ID:</strong> {{ $cicloUsuario->id }} <br>
                    <strong>Fecha Matrícula:</strong> {{ $cicloUsuario->fecha_matricula }} <br>
                    
                    <!-- Mostrar nombre del ciclo -->
                    <strong>Nombre Ciclo:</strong>
                    @if ($cicloUsuario->ciclo)
                        {{ $cicloUsuario->ciclo->nombre }}
                    @else
                        <span class="text-muted">Ciclo no disponible</span>
                    @endif
                    <br>
                    
                    <!-- Mostrar nombre del usuario -->
                    <strong>Nombre del Usuario:</strong>
                    @if ($cicloUsuario->usuario)
                        {{ $cicloUsuario->usuario->name }}
                    @else
                        <span class="text-muted">Usuario no disponible</span>
                    @endif
                </div>

                <div>
                    <a href="{{ route('ciclo_usuario.edit', $cicloUsuario->id) }}" class="btn btn-warning btn-sm" title="Editar">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('ciclo_usuario.destroy', $cicloUsuario->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')" title="Eliminar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
