<!-- Formulario de creación y editar-->
<form action="{{ $action }}" method="POST">
    @csrf

    <!-- Campo para seleccionar el ciclo -->
    <div class="form-group">
        <label for="ciclo_id">Ciclo:</label>
        <select name="ciclo_id" id="ciclo_id" class="form-control" required>
            <option value="">Selecciona un ciclo</option>
            @foreach($ciclos as $ciclo)
                <option value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo para seleccionar el usuario -->
    <div class="form-group">
        <label for="usuario_id">Usuario:</label>
        <select name="usuario_id" id="usuario_id" class="form-control" required>
            <option value="">Selecciona un usuario</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo para la fecha de matrícula -->
    <div class="form-group">
        <label for="fecha_matricula">Fecha de Matrícula:</label>
        <input type="date" name="fecha_matricula" id="fecha_matricula" class="form-control" required>
    </div>

    <!-- Botón de enviar -->
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </div>
</form>

-----------------------------------------------------------------------------
@extends('layouts.general')

@section('content')
<div class="container">
    <h1>Editar Ciclo Usuario</h1>

    <form action="{{ route('ciclo_usuario.update', $ciclo_usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Contenedor para el formulario -->
        <div class="card">
            <div class="card-body">

                <!-- Campo para seleccionar el ciclo -->
                <div class="form-group">
                    <label for="ciclo_id">Ciclo</label>
                    <select name="ciclo_id" id="ciclo_id" class="form-control">
                        @foreach($ciclos as $ciclo)
                            <option value="{{ $ciclo->id }}" {{ $ciclo->id == $ciclo_usuario->ciclo_id ? 'selected' : '' }}>
                                {{ $ciclo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo para seleccionar el usuario -->
                <div class="form-group">
                    <label for="usuario_id">Usuario</label>
                    <select name="usuario_id" id="usuario_id" class="form-control">
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ $usuario->id == $ciclo_usuario->usuario_id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo para la fecha de matrícula -->
                <div class="form-group">
                    <label for="fecha_matricula">Fecha Matrícula</label>
                    <input type="date" name="fecha_matricula" id="fecha_matricula" class="form-control"
                        value="{{ $ciclo_usuario->fecha_matricula }}">
                </div>

            </div>
        </div>

        <!-- Botón de enviar -->
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('ciclo_usuario.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>
@endsection
