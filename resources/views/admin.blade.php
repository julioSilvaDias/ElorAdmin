@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('page-title', 'Dashboard Overview')

@section('content')

<div class="row g-4">
    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('users.alumnos') }}" class="text-decoration-none">
            <div class="card text-bg-primary mb-4">
                <div class="card-header">
                    <h1>Total Alumnos</h1>
                </div>
                <div class="card-body">
                    <h2>{{ count($alumnos) }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('users.personal') }}" class="text-decoration-none">
            <div class="card text-bg-success mb-4">
                <div class="card-header">
                    <h1>Total Personal</h1>
                </div>
                <div class="card-body">
                    <h2>{{ count($personal) }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('reunions.reunionesHoyAceptada') }}" class="text-decoration-none">
            <div class="card text-bg-warning mb-4">
                <div class="card-header">
                    <h1>nº de reuniones aceptadas para el día de hoy del profesorado</h1>
                </div>
                <div class="card-body">
                    <h2>{{ count($reunionesHoyAceptada) }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('reunions.reunionesHoyPendiente') }}" class="text-decoration-none">
            <div class="card text-bg-danger mb-4">
                <div class="card-header">
                    <h1>nº de reuniones pendientes para el día de hoy del profesorado</h1>
                </div>
                <div class="card-body">
                    <h2>{{ count($reunionesHoyPendiente) }}</h2>
                </div>
            </div>
        </a>
    </div>

</div>

<div class="row g-4">
    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('reunions.reunionesApartirHoy') }}" class="text-decoration-none">
            <div class="card text-bg-primary mb-4">
                <div class="card-header">
                    <h1>nº de reuniones totales a partir del día de hoy</h1>
                </div>
                <div class="card-body">
                    <h2>{{ count($reunionesApartirHoy) }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('ciclos.index') }}" class="text-decoration-none">
            <div class="card text-bg-success mb-4">
                <div class="card-header">
                    <h1>Nº de Ciclos Formativos</h1>
                </div>
                <div class="card-body">
                    <h2>{{ count($ciclos) }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('users.usersSinRol') }}" class="text-decoration-none">
            <div class="card text-bg-warning mb-4">
                <div class="card-header">
                    <h1>Nº de Usuarios sin Rol</h1>
                </div>
                <div class="card-body">
                    <h2>{{ count($usersSinRol) }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('asignaturas.index') }}" class="text-decoration-none">
            <div class="card text-bg-danger mb-4">
                <div class="card-header">
                    <h1>Nº de Módulos</h1>
                </div>
                <div class="card-body">
                    <h2>{{ count($asignaturas) }}</h2>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection