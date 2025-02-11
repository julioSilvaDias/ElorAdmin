<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ciclos</title>

    <link rel="icon" href="{{ asset('images/EEM-Logo-vertical.png') }}" type="image/svg">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.svg') }}" height="50" class="me-2">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                        <!-- Enlaces del índice de otros modelos -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.personal') }}">Personal</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('allCiclos') }}">Ciclos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.alumnos') }}">Alumnos</a>
                        </li>

                        <!--otros enlaces -->
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
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
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
                <div class="container">
                <!-- Ciclos -->
                <div class="row text-center g-4">
                    @foreach ($ciclos as $ciclo)
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $ciclo->id }}" aria-expanded="true" aria-controls="collapseOne">
                                    <strong>Ciclo</strong> : {{ $ciclo->nombre }}
                                </button>
                            </h2>
                            <div id="collapse{{ $ciclo->id }}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @foreach ($ciclo->asignaturas as $asignatura)
                                    <strong>{{ $asignatura->nombre }}</strong> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <div class="row py-4 text-white">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <h5 class="text-uppercase">Elorrieta-Errekamari</h5>
                        <p>Tu centro de confianza para aprender y crecer.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h6 class="text-uppercase">Síguenos</h6>
                        <a href="#" class="text-white me-3">Facebook<i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3">Twitter<i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white">Instagram<i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="text-center py-3" style="background-color: #211261;">
                    &copy; {{ date('Y') }} Elorrieta-Errekamari. Todos los derechos reservados.
                </div>
            </div>
        </footer>
    </div>
</body>

</html>