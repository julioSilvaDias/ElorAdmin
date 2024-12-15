@extends('layouts.app')

@section('content')
    <h1>Detalles del Rol</h1>
    <p><strong>ID:</strong> {{ $rol->id }}</p>
    <p><strong>Nombre:</strong> {{ $rol->name }}</p>
    <p><strong>Descripción:</strong> {{ $rol->description }}</p>

    <a href="{{ route('rols.index') }}" class="btn btn-primary">Volver</a>
@endsection
