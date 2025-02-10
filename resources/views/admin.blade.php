@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('page-title', 'Dashboard Overview')

@section('content')


<div class="row g-4">
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
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card text-bg-primary mb-4">
            <div class="card-header">
                <h6>Total Users</h6>
            </div>
            <div class="card-body">
                <h3>{{ count($users) }}</h3>
                <p>Active this week</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card text-bg-success mb-4">
            <div class="card-header">
                <h6>Revenue</h6>
            </div>
            <div class="card-body">
                <h3>$5,678</h3>
                <p>Past 30 days</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card text-bg-warning mb-4">
            <div class="card-header">
                <h6>Pending Tasks</h6>
            </div>
            <div class="card-body">
                <h3>45</h3>
                <p>Due this week</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card text-bg-danger mb-4">
            <div class="card-header">
                <h6>Errors</h6>
            </div>
            <div class="card-body">
                <h3>8</h3>
                <p>Critical issues</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Recent Activity</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">User <strong>John Doe</strong> registered.</li>
                    <li class="list-group-item">New order placed: #10234.</li>
                    <li class="list-group-item">Payment received for Invoice #10456.</li>
                    <li class="list-group-item">System updated successfully.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6>Quick Actions</h6>
            </div>
            <div class="card-body">
                <button class="btn btn-primary w-100 mb-2">Add User</button>
                <button class="btn btn-success w-100 mb-2">Generate Report</button>
                <button class="btn btn-danger w-100">Clear Logs</button>
            </div>
        </div>
    </div>
</div>
@endsection