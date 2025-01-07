@extends('layouts.general')

@section('content')

<div class="container">
    <h1>Detalles del Usuario</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Apellido:</strong> {{ $user->surname }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <p><strong>Rol:</strong> {{$rol->name}}</p>

    <a href="{{ route('users.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
