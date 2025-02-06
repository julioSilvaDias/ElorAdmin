@extends('layouts.general')

@section('content')

<div class="container">
    <h1>Roles</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('rols.create') }}" class="btn btn-primary">Crear Rol</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rols as $rol)
                <tr>
                    <td>{{ $rol->id }}</td>
                    <td>{{ $rol->name }}</td>
                    <td>{{ $rol->description }}</td>
                    <td>
                        <a href="{{ route('rols.show', $rol->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('rols.edit', $rol->id) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('rols.destroy', $rol->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection