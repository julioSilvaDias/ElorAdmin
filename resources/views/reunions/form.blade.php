@extends('layouts.general')

@section('content')
<div class="container">
    <h1>{{ $method === 'PUT' ? 'Editar Reunión' : 'Crear Nueva Reunión' }}</h1>

    <form action="{{ $action }}" method="POST">
        @csrf
        @if($method === 'PUT')
            @method('PUT')
        @endif

        <!-- Comentario -->
        <div class="form-group">
            <label for="comentario">Comentario:</label>
            <input type="text" name="comentario" class="form-control" value="{{ $reunion->comentario ?? '' }}">
        </div>

        <!-- Estado -->
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control">
                <option value="pendiente" {{ (isset($reunion) && $reunion->estado === 'pendiente') ? 'selected' : '' }}>Pendiente</option>
                <option value="aceptado" {{ (isset($reunion) && $reunion->estado === 'aceptado') ? 'selected' : '' }}>Aceptado</option>
                <option value="rechazado" {{ (isset($reunion) && $reunion->estado === 'rechazado') ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>

        <!-- Fecha y hora de inicio -->
        <div class="form-group">
            <label for="fecha-hora-inicio">Fecha y hora de inicio:</label>
            <input type="datetime-local" name="fecha-hora-inicio" class="form-control" value="{{ $reunion->{'fecha-hora-inicio'} ?? '' }}">
        </div>

        <!-- Fecha y hora de fin -->
        <div class="form-group">
            <label for="fecha-hora-fin">Fecha y hora de fin:</label>
            <input type="datetime-local" name="fecha-hora-fin" class="form-control" value="{{ $reunion->{'fecha-hora-fin'} ?? '' }}">
        </div>

        <!-- Emisor ID -->
        <div class="form-group">
            <label for="emisor_id">Emisor ID:</label>
            <input type="number" name="emisor_id" class="form-control" value="{{ $reunion->emisor_id ?? '' }}">
        </div>

        <!-- Receptor ID -->
        <div class="form-group">
            <label for="receptor_id">Receptor ID:</label>
            <input type="number" name="receptor_id" class="form-control" value="{{ $reunion->receptor_id ?? '' }}">
        </div>

        <!-- Botón de Enviar -->
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection
