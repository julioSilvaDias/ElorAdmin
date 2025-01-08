@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Ciclo Usuario</h1>

    <!-- Formulario de creación -->
    <form action="{{ route('ciclo_usuario.store') }}" method="POST">
        @csrf

        <!-- Campo para seleccionar el ciclo -->
        <div class="form-group">
            <label for="ciclo_id">Ciclo</label>
            <select name="ciclo_id" id="ciclo_id" class="form-control">
                <option value="">Selecciona un ciclo</option>
                @foreach($ciclos as $ciclo)
                    <option value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo para seleccionar el usuario -->
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-control">
                <option value="">Selecciona un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Botón de enviar -->
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>
@endsection
