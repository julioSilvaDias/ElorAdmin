@extends('layouts.general')

@section('title', 'Inicio - CIPF Elorrieta Errekamari')


@section('content')
<div class="container">
    <!-- Sección de Bienvenida -->
    <div class="row justify-content-center my-5">
        <div class="col-md-8 text-center">
            <h1 class="display-4 text-primary">¡Bienvenido a Elorrieta-Errekamari!</h1>
            <p class="lead text-secondary">Tu plataforma de confianza para gestionar horarios, usuarios y roles de manera eficiente.</p>
        </div>
    </div>

    <!-- Tarjetas de Funcionalidades -->
    <div class="row text-center g-4">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-people-fill display-3 text-primary"></i>
                    <h5 class="card-title mt-3">Gestión de Usuarios</h5>
                    <p class="card-text">Administra todos los usuarios registrados en el sistema de manera sencilla.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuarios</a>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-calendar2-week-fill display-3 text-success"></i>
                    <h5 class="card-title mt-3">Gestión de Horarios</h5>
                    <p class="card-text">Consulta y edita los horarios según las necesidades del centro educativo.</p>
                    <a href="{{ route('horarios.index') }}" class="btn btn-success">Ver Horarios</a>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-shield-lock-fill display-3 text-danger"></i>
                    <h5 class="card-title mt-3">Gestión de Roles</h5>
                    <p class="card-text">Asigna y controla los permisos de acceso de cada usuario según su rol.</p>
                    <a href="{{ route('rols.index') }}" class="btn btn-danger">Ver Roles</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección Informativa -->
    <div class="row mt-5">
        <div class="col text-center">
            <h2 class="text-secondary">Conoce más sobre nosotros</h2>
            <p class="text-muted">Elorrieta-Errekamari es un centro educativo comprometido con la excelencia en la gestión de recursos académicos y administrativos.</p>
            <a href="https://www.elorrieta.eus/es/" class="btn btn-outline-secondary" target="blank">Leer más</a>
        </div>
    </div>

    <!-- Testimonios -->
<div class="row mt-5 p-5" style="background-color: #f0f4ff; border-radius: 8px;">
    <div class="col-12 text-center mb-4">
        <h2 class="text-secondary">Lo que dicen nuestros usuarios</h2>
    </div>
    <div class="col-md-4 text-center">
        <blockquote class="blockquote">
            <p>"Elorrieta-Errekamari ha facilitado enormemente la gestión de horarios y usuarios. ¡Increíble herramienta!"</p>
            <footer class="blockquote-footer">María Suarez</footer>
        </blockquote>
    </div>
    <div class="col-md-4 text-center">
        <blockquote class="blockquote">
            <p>"La plataforma es intuitiva y práctica. Recomendada para cualquier centro educativo."</p>
            <footer class="blockquote-footer">Jordy Viracocha</footer>
        </blockquote>
    </div>
    <div class="col-md-4 text-center">
        <blockquote class="blockquote">
            <p>"Una solución completa para la gestión de roles y horarios. Excelente soporte técnico."</p>
            <footer class="blockquote-footer">Julio Silva</footer>
        </blockquote>
    </div>
</div>


    <!-- Galería o Imagen -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h2 class="text-secondary">Nuestra visión</h2>
            <img src="https://via.placeholder.com/1200x400" class="img-fluid rounded shadow" alt="Nuestra visión">
        </div>
    </div>

    <!-- Botón Final -->
    <div class="row mt-5">
        <div class="col text-center">
            <a href="https://www.elorrieta.eus/es/centro/elorrieta-erreka-mari-2/" class="btn btn-lg btn-primary" target="blank">Explorar más</a>
        </div>
    </div>
</div>
@endsection