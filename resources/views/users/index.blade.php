@extends('layouts.general')

@section('title', 'Página de Usuarios')

@section('content')
<div class="container">
    <h1 class="mb-4">Usuarios</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>

    <table class="table table-striped table-hover dark:bg-gray-800 dark:text-white">
        <thead class="bg-light dark:bg-gray-900">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="dark:hover:bg-gray-700">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Botón Ver -->
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>

                        <!-- Botón Editar -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <!-- Botón Eliminar -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
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
