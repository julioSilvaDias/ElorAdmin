<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Elorrieta Errekamari'))</title>

    <link rel="icon" href="{{ asset('images/EEM-Logo-vertical.png') }}" type="image/svg">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Modo oscuro CSS -->
    <style>
        :root {
            --bg-light: white;
            --text-light: black;
            --bg-dark: #121212;
            --text-dark: white;
        }

        body.light {
            background-color: var(--bg-light);
            color: var(--text-light);
        }

        body.dark {
            background-color: var(--bg-dark);
            color: var(--text-dark);
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm dark:bg-dark">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center text-light" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.svg') }}" height="50" class="me-2">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('users.index') }}">Usuarios</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('rols.index') }}">Roles</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('reunions.index') }}">Reuniones</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('horarios.index') }}">Horarios</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('ciclos.index') }}">Ciclos</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('asignaturas.index') }}">Asignaturas</a></li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item"><a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                        <!-- Botón de modo oscuro -->
                        <li class="nav-item">
                            <button id="darkModeToggle" class="btn btn-light">
                                <i id="darkModeIcon" class="bi bi-moon"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contenido principal -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row py-4 text-white">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <h5 class="text-uppercase">Elorrieta-Errekamari</h5>
                        <p>Tu centro de confianza para aprender y crecer.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h6 class="text-uppercase">Síguenos</h6>
                        <a href="#" class="text-white me-3">Facebook <i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3">Twitter <i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white">Instagram <i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="text-center py-3" style="background-color: #211261;">
                    &copy; {{ date('Y') }} Elorrieta-Errekamari. Todos los derechos reservados.
                </div>
            </div>
        </footer>
    </div>

    <!-- Script para manejar el modo oscuro -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const body = document.body;
            const toggleBtn = document.getElementById("darkModeToggle");
            const icon = document.getElementById("darkModeIcon");

            // Cargar preferencia guardada
            if (localStorage.getItem("theme") === "dark") {
                body.classList.add("dark");
                icon.classList.replace("bi-moon", "bi-sun");
            } else {
                body.classList.add("light");
                icon.classList.replace("bi-sun", "bi-moon");
            }

            toggleBtn.addEventListener("click", function () {
                if (body.classList.contains("dark")) {
                    body.classList.remove("dark");
                    body.classList.add("light");
                    icon.classList.replace("bi-sun", "bi-moon");
                    localStorage.setItem("theme", "light");
                } else {
                    body.classList.remove("light");
                    body.classList.add("dark");
                    icon.classList.replace("bi-moon", "bi-sun");
                    localStorage.setItem("theme", "dark");
                }
            });
        });
    </script>

</body>
</html>
