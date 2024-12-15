@extends('layouts.app')

@section('content')
    <h1>Editar Rol</h1>
    <form action="{{ route('rols.update', $rol->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $rol->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $rol->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection
