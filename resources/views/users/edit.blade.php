@extends('layouts.general')

@section('title', 'Editar Usuario')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Nueva Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection
