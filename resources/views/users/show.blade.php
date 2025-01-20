@extends('layouts.general')

@section('content')

<div class="container">
    <h1>Detalles del Usuario</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Apellido:</strong> {{ $user->surname }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <p><strong>Rol:</strong> {{$rol ? $rol->name : 'Sin rol asignado'}}</p>

    <!-- Formulario para matricular al usuario en un ciclo -->
    <div class="mt-4">
        <h2>Matricular en un Ciclo</h2>
        @if ($rol && $rol->name === 'Alumno')
            <form action="{{ route('users.matricular', $user->id) }}" method="POST">
                @csrf
                <label for="id_ciclo">Selecciona un ciclo:</label>
                <select name="id_ciclo" id="id_ciclo" class="form-control">
                    @foreach($ciclos as $ciclo)
                        <option value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success mt-3">Matricular</button>
            </form>
        @else
            <p>Este usuario no puede ser matriculado porque no es Alumno.</p>
        @endif
    </div>

    <a href="{{ route('users.index') }}" class="btn btn-primary">Volver</a>

</div>
@endsection
